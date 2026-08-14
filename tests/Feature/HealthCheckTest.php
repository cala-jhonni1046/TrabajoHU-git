<?php

test('la ruta de health check responde HTTP 200', function () {
    $this->get('/health')
        ->assertOk()
        ->assertJson(['status' => 'ok']);
});