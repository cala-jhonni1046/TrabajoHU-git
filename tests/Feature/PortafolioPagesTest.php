<?php

use App\Models\Contacto;

test('la landing responde correctamente', function () {
    $this->get(route('inicio'))
        ->assertOk()
        ->assertSee('Jonatan Cala')
        ->assertSee('Full Stack Developer');
});

test('la landing contiene todas las secciones', function () {
    $this->get(route('inicio'))
        ->assertOk()
        ->assertSee('Conoce más sobre mi trabajo')
        ->assertSee('Tecnologías y herramientas')
        ->assertSee('Trabajos destacados')
        ->assertSee('Trayectoria profesional')
        ->assertSee('Hablemos de tu proyecto')
        ->assertSee('name="nombre"', false);
});

test('las rutas antiguas redirigen a su sección en la landing', function () {
    $this->get(route('sobre-mi'))->assertRedirect(route('inicio').'#sobremi');
    $this->get(route('habilidades'))->assertRedirect(route('inicio').'#habilidades');
    $this->get(route('proyectos'))->assertRedirect(route('inicio').'#proyectos');
    $this->get(route('experiencia'))->assertRedirect(route('inicio').'#experiencia');
    $this->get(route('contacto'))->assertRedirect(route('inicio').'#contacto');
});

test('el formulario de contacto guarda el mensaje en la base de datos', function () {
    $this->post(route('contacto.store'), [
        'nombre' => 'Test User',
        'email' => 'test@example.com',
        'asunto' => 'Prueba',
        'mensaje' => 'Mensaje de prueba',
    ])->assertRedirect(route('inicio').'#contacto');

    $this->assertDatabaseHas('contactos', [
        'nombre' => 'Test User',
        'email' => 'test@example.com',
        'asunto' => 'Prueba',
        'mensaje' => 'Mensaje de prueba',
    ]);

    expect(Contacto::count())->toBe(1);
});
