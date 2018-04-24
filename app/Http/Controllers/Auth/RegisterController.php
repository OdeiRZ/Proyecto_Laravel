<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:40|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'avatar' => 'http://lorempixel/300/300/people?' . random_int(1, 1000),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /*public function messages() {
        return [
            'name.required' => 'El nombre no puede estar vacío',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.max' => 'El nombre no puede superar los 255 caracteres',

            'username.required' => 'El nombre de usuario no puede estar vacío',
            'username.string' => 'El nombre de usuario debe ser una cadena de texto',
            'username.max' => 'El nombre de usuario no puede superar los 40 caracteres',
            'username.unique' => 'El nombre de usuario ya está en uso',

            'email.required' => 'El correo no puede estar vacío',
            'email.string' => 'El correo debe ser una cadena de texto',
            'email.email' => 'El correo debe tener formato de email',
            'email.max' => 'El correo no puede superar los 255 caracteres',
            'email.unique' => 'El correo ya está en uso',

            'password.required' => 'La contraseña no puede estar vacía',
            'password.string' => 'La contraseña debe ser una cadena de texto',
            'password.min' => 'La contraseña debe ser superior a 6 caracteres',
            'password.confirmed' => 'Las contraseñas deben coincidir',
        ];
    }*/
}
