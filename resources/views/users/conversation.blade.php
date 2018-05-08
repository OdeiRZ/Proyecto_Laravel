@extends('layouts.app')

@section('content')
    <h1 class="h3">Conversación con {{ $conversation->users->except($user->id)->implode('name', ', ') }}</h1>
    @foreach($conversation->privateMessages as $message)
    <div class="card">
        <div class="card-header">{{ $message->user->name }}     dijo:</div>
        <div class="card-block">{{ $message->message }}</p>
        <div class="card-footer">{{ $message->created_at }}</p>
    </div>
    @endforeach
@endsection
