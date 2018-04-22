<?php

namespace App\Http\Controllers;

use App\Mensaje;
use Illuminate\Http\Request;

class MensajesController extends Controller
{
    public function mostrar(Mensaje $mensaje) {
        return view('mensajes.mostrar', [
            'mensaje' => $mensaje
        ]);
    }
}
