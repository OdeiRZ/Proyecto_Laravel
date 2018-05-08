<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\PrivateMessage;
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

    public function unfollow($username, Request $request) {
        $user = $this->findByUsername($username);
        $me = $request->user();
        $me->follows()->detach($user);
        return redirect("/$username")->withSuccess("¡Usuario dejado de Seguir!");
    }

    public function follows($username) {
        $user = $this->findByUsername($username);
        if ($user) {
            return view('users.follows', [
                'user' => $user,
                'follows' => $user->follows
            ]);
        } else {
            return redirect('/');
        }
    }

    public function followers($username) {
        $user = $this->findByUsername($username);
        if ($user) {
            return view('users.follows', [
                'user' => $user,
                'follows' => $user->followers
            ]);
        } else {
            return redirect('/');
        }
    }

    public function sendPrivateMessage($username, Request $request) {
        $user = $this->findByUsername($username);
        $me = $request->user();
        $message = $request->input('message');
        $conversation = Conversation::between($me, $user);
        $privateMessage = PrivateMessage::create([
            'conversation_id' => $conversation->id,
            'user_id' => $me->id,
            'message' => $message
        ]);
        return redirect('/conversation/' . $conversation->id);
    }

    public function showConversation(Conversation $conversation) {
        $conversation->load('users', 'privateMessages');
        return view('users.conversation', [
            'conversation' => $conversation,
            'user' => auth()->user()
        ]);
    }

    private function findByUsername($username) {
        return User::where('username', $username)->first();
    }


}
