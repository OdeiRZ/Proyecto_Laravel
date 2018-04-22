<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        $links = [
            'https://laravel.com/docs' => 'Documentation',
            'https://laracasts.com' => 'Laracasts'
        ];
        return view('welcome', [
            'teacher' => 'Lorem Ipsum',
            'links' => $links
        ]);
    }

    public function about() {
        return view('about');
    }
}
