<?php

namespace App\Http\Controllers;

use App\Mensaje;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        $mensajes = Mensaje::all();
        return view('welcome', [
            'mensajes' => $mensajes
        ]);
    }
}
