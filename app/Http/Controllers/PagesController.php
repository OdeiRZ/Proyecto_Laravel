<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        $mensajes = [
            [
                'id' => 1,
                'contenido' => 'Primer Mensaje',
                'imagen' => 'http://via.placeholder.com/600x338'
            ],
            [
                'id' => 2,
                'contenido' => 'Segundo Mensaje',
                'imagen' => 'http://via.placeholder.com/600x338'
            ],
            [
                'id' => 3,
                'contenido' => 'Tercer Mensaje',
                'imagen' => 'http://via.placeholder.com/600x338'
            ],
            [
                'id' => 4,
                'contenido' => 'Cuarto Mensaje',
                'imagen' => 'http://via.placeholder.com/600x338'
            ],
        ];
        return view('welcome', [
            'mensajes' => $mensajes
        ]);
    }
}
