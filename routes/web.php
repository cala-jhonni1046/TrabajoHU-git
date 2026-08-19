<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PortafolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortafolioController::class, 'inicio'])->name('inicio');

Route::get('/sobre-mi', fn () => redirect()->to(route('inicio').'#sobremi'))->name('sobre-mi');

Route::get('/habilidades', fn () => redirect()->to(route('inicio').'#habilidades'))->name('habilidades');

Route::get('/proyectos', fn () => redirect()->to(route('inicio').'#proyectos'))->name('proyectos');

Route::get('/experiencia', fn () => redirect()->to(route('inicio').'#experiencia'))->name('experiencia');

Route::get('/contacto', fn () => redirect()->to(route('inicio').'#contacto'))->name('contacto');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');
