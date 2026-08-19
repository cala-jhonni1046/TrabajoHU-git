<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function store(Request $request)
    {
        Contacto::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
        ]);

        return redirect()->to(route('inicio').'#contacto')->with('success', '¡Mensaje enviado correctamente!');

    }
}
