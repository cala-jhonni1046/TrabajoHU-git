<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortafolioController;
use App\Http\Controllers\ContactoController;

Route::get('/', [PortafolioController::class, 'inicio'])->name('inicio');

Route::get('/sobre-mi', [PortafolioController::class, 'sobreMi'])->name('sobre-mi');

Route::get('/habilidades', [PortafolioController::class, 'habilidades'])->name('habilidades');

Route::get('/proyectos', [PortafolioController::class, 'proyectos'])->name('proyectos');

Route::get('/experiencia', [PortafolioController::class, 'experiencia'])->name('experiencia');

Route::get('/contacto', [ContactoController::class, 'contacto'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');