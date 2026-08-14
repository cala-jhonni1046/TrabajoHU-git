FROM php:8.2-apache

WORKDIR /var/www/html

# Dependencias del sistema. "unzip"/"zip" son imprescindibles para que Composer
# pueda descomprimir los paquetes de Packagist en builds limpios (Render).
# "libpq-dev" es necesaria para la extensión pdo_pgsql (PostgreSQL de Render).
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        ca-certificates \
        curl \
        git \
        gnupg \
        libpq-dev \
        unzip \
        zip \
    && rm -rf /var/lib/apt/lists/*

# Extensiones PHP: pdo_mysql (docker-compose local) y pdo_pgsql (PostgreSQL en Render).
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql

# Composer oficial (versión fijada para builds reproducibles).
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Node.js 22, necesario para compilar los assets de Vite/Tailwind durante el build.
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y --no-install-recommends nodejs \
    && rm -rf /var/lib/apt/lists/*

COPY . .

# Dependencias PHP de producción (sin require-dev) y autoloader optimizado.
RUN composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction --no-progress

# Dependencias frontend y compilación de assets (genera public/build).
RUN npm ci --no-audit --no-fund \
    && npm run build

# Apache: habilitar rewrite y apuntar el document root a la carpeta pública de Laravel.
RUN a2enmod rewrite \
    && sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
    && printf '<Directory /var/www/html/public>\n    AllowOverride All\n    Require all granted\n</Directory>\n' >> /etc/apache2/apache2.conf

# Permisos de escritura para storage y caches de Laravel.
RUN chown -R www-data:www-data storage bootstrap/cache

# Entrypoint: adapta Apache al puerto dinámico de Render, genera APP_KEY si falta
# y ejecuta las migraciones antes de iniciar el servidor.
COPY docker/entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["apache2-foreground"]
