<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($username) {
        $user = $this->findByUsername($username);
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

    public function follow($username, Request $request) {
        $user = $this->findByUsername($username);
        $me = $request->user();
        $me->follows()->attach($user);
        return redirect("/$username")->withSuccess("¡Usuario Seguido!");
    }

    public function follows($username) {
        $user = $this->findByUsername($username);
        if ($user) {
            return view('users.follows', [
                'user' => $user
            ]);
        } else {
            return redirect('/');
        }
    }

    private function findByUsername($username) {
        return User::where('username', $username)->first();
    }
}
