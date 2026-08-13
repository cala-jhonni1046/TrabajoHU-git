<?php

use App\Models\Contacto;

test('la página de inicio responde correctamente', function () {
    $this->get(route('inicio'))
        ->assertOk()
        ->assertSee('Jonatan Cala')
        ->assertSee('Full Stack Developer');
});

test('la página sobre mí responde correctamente', function () {
    $this->get(route('sobre-mi'))
        ->assertOk()
        ->assertSee('Conoce más sobre mi trabajo');
});

test('la página de habilidades responde correctamente', function () {
    $this->get(route('habilidades'))
        ->assertOk()
        ->assertSee('Tecnologías y herramientas');
});

test('la página de proyectos responde correctamente', function () {
    $this->get(route('proyectos'))
        ->assertOk()
        ->assertSee('Trabajos destacados');
});

test('la página de experiencia responde correctamente', function () {
    $this->get(route('experiencia'))
        ->assertOk()
        ->assertSee('Trayectoria profesional');
});

test('la página de contacto responde correctamente y muestra el formulario', function () {
    $this->get(route('contacto'))
        ->assertOk()
        ->assertSee('Hablemos de tu proyecto')
        ->assertSee('name="nombre"', false);
});

test('el formulario de contacto guarda el mensaje en la base de datos', function () {
    $this->post(route('contacto.store'), [
        'nombre' => 'Test User',
        'email' => 'test@example.com',
        'asunto' => 'Prueba',
        'mensaje' => 'Mensaje de prueba',
    ])->assertRedirect(route('contacto'));

    $this->assertDatabaseHas('contactos', [
        'nombre' => 'Test User',
        'email' => 'test@example.com',
        'asunto' => 'Prueba',
        'mensaje' => 'Mensaje de prueba',
    ]);

    expect(Contacto::count())->toBe(1);
});