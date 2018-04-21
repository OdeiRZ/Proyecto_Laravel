<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $links = [
        'https://laravel.com/docs' => 'Documentation',
        'https://laracasts.com' => 'Laracasts'
    ];
    return view('welcome', [
        'teacher' => 'Lorem Ipsum',
        'links' => $links
    ]);
});

Route::get('/acerca', function () {
    return view('about');
});
