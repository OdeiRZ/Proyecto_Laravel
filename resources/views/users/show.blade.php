@extends('layouts.app')

@section('content')
    <h1 class="h3">{{ $user->name }}</h1>
    <a href="/{{ $user->username }}/follows" class="btn btn-link">
        Sigue a <span class="badge badge-secondary">{{ $user->follows->count() }}</span>
    </a>
    <a href="/{{ $user->username }}/followers" class="btn btn-link">
        Seguidores <span class="badge badge-secondary">{{ $user->followers->count() }}</span>
    </a>
    @if(Auth::check())
        @if(Gate::allows('dms', $user))
        <form action="/{{ $user->username }}/dms" method="post">
            {{ csrf_field() }}
            <input type="text" name="message" class="form-control">
            <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
        </form>
        @endif
        @if(Auth::user()->isFollowing($user))
        <form action="/{{ $user->username }}/unfollow" method="post">
            {{ csrf_field() }}
            @if (session('success'))
                <span class="text-success">{{ session('success') }}</span>
            @endif
            <button class="btn btn-danger">Dejar de seguir</button>
        </form>
        @else
        <form action="/{{ $user->username }}/follow" method="post">
            {{ csrf_field() }}
            @if (session('success'))
                <span class="text-success">{{ session('success') }}</span>
            @endif
            <button class="btn btn-primary">Seguir</button>
        </form>
        @endif
    @endif

    <div class="row">
        @forelse($messages as $message) {{--$user->messages--}}
        <div class="col-6">
            @include('messages.message')
        </div>
        @empty
        <p class="col-6 pt-3">El usuario no tiene mensajes</p>
        @endforelse
    </div>

    @if(count($messages))
    <div class="mt-2 mx-auto">
        {{ $messages->links(/*'pagination::bootstrap-4'*/) }}
    </div>
    @endif
@endsection
