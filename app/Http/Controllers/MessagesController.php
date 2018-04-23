<?php

namespace App\Http\Controllers;

use App\Message;
use App\Http\Requests\CreateMessageRequest;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function show(Message $message) {
        return view('messages.show', [
            'message' => $message
        ]);
    }

    public function create(CreateMessageRequest $request) {
        $message = Message::create([
            'content' => $request->input('message'),
            'image' => 'http://via.placeholder.com/600x338'
        ]);
        return redirect('/messages/' . $message->id);
    }
}
