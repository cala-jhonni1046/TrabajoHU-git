<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;               

class ContactoController extends Controller
{
    public function contacto()
    {
        return view('contacto');
    }

    public function store(Request $request)
    {
        Contacto::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje
        ]);

      return redirect()->route('contacto')->with('success', '¡Mensaje enviado correctamente!');
       
    }
}