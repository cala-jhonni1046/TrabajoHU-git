<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    public function inicio()
    {
        return view('inicio');
    }

    public function sobreMi()
    {
        return view('sobre-mi');
    }

    public function habilidades()
    {
        return view('habilidades');
    }

    public function proyectos()
    {
        return view('proyectos');
    }

    public function experiencia()
    {
        return view('experiencia');
    }
}