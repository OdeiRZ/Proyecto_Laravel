<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($username) {
        $user = User::where('username', $username)->first();
        if ($user) {
            $messages = $user->messages()->paginate(10);
            return view('users.show', [
                'user' => $user,
                'messages' => $messages
            ]);
        } else {
            return redirect('/');
        }
    }
}
