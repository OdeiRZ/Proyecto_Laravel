<?php

namespace App\Http\Controllers;

use App\Mensaje;
use App\Http\Requests\CrearMensajeRequest;
use Illuminate\Http\Request;

class MensajesController extends Controller
{
    public function mostrar(Mensaje $mensaje) {
        return view('mensajes.mostrar', [
            'mensaje' => $mensaje
        ]);
    }

    public function crear(CrearMensajeRequest $request) {
        $mensaje = Mensaje::create([
            'contenido' => $request->input('mensaje'),
            'imagen' => 'http://via.placeholder.com/600x338'
        ]);
        return redirect('/mensajes/' . $mensaje->id);
    }
}
