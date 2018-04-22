<?php

namespace App\Http\Controllers;

use App\Mensaje;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        $mensajes = Mensaje::paginate(10);
        return view('welcome', [
            'mensajes' => $mensajes
        ]);
    }
}
