#!/bin/sh
# Entrypoint del contenedor Laravel.
# Prepara Apache para el puerto dinámico de Render ($PORT), genera APP_KEY si
# falta y ejecuta las migraciones antes de iniciar el servidor web.
set -e

cd /var/www/html

# 1) Archivo .env base: si no existe (build limpio), se crea a partir de .env.example.
#    En producción las variables reales (APP_KEY, DB_*, APP_ENV, ...) se inyectan
#    como variables de entorno desde el proveedor (Render) y tienen prioridad.
if [ ! -f .env ]; then
    echo "Creando .env a partir de .env.example..."
    cp .env.example .env
fi

# APP_KEY: si no viene definida como variable de entorno, se usa la que ya exista
# en .env y solo se genera una nueva cuando no hay ninguna válida.
if [ -z "${APP_KEY}" ]; then
    file_key=$(grep -E '^APP_KEY=' .env 2>/dev/null | head -n 1 | cut -d= -f2-)
    if [ -z "$file_key" ] || [ "$file_key" = "base64:" ]; then
        echo "APP_KEY no definida. Generando una nueva..."
        php artisan key:generate --force
    fi
fi

# 2) Permisos de storage/cache. Tolerante a volúmenes de bind mount (docker-compose).
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true

# 3) Puerto dinámico de Render. Si no hay $PORT (p.ej. docker-compose local),
#    Apache permanece en el puerto 80.
if [ -n "${PORT}" ] && [ "${PORT}" != "80" ]; then
    sed -ri "s/^Listen 80$/Listen ${PORT}/" /etc/apache2/ports.conf
    sed -ri "s#<VirtualHost \*:80>#<VirtualHost *:${PORT}>#" /etc/apache2/sites-available/000-default.conf
fi

# 4) Migraciones con reintentos mientras la base de datos termina de arrancar.
#    Desactivar con RUN_MIGRATIONS=false si se prefiere migrar manualmente.
if [ "${RUN_MIGRATIONS:-true}" != "false" ]; then
    echo "Ejecutando migraciones..."
    n=1
    while [ "$n" -le 30 ]; do
        if php artisan migrate --force --no-interaction; then
            echo "Migraciones completadas."
            break
        fi
        if [ "$n" -eq 30 ]; then
            echo "Aviso: no se pudieron ejecutar las migraciones tras 30 intentos. La app iniciará igualmente."
        else
            echo "Base de datos no disponible (intento ${n}/30). Reintentando en 2s..."
        fi
        n=$((n + 1))
        sleep 2
    done
fi

# 5) Iniciar el comando de Apache en primer plano.
exec "$@"