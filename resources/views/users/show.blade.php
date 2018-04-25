@extends('layouts.app')

@section('content')
    <h1 class="h3">{{ $user->name }}</h1>
    <div class="row">
        @forelse($messages as $message) {{--$user->messages--}}
            <div class="col-6">
                @include('messages.message')
            </div>
        @empty
            <p>El usuario no tiene mensajes</p>
        @endforelse
    </div>

    @if(count($messages))
    <div class="mt-2 mx-auto">
        {{ $messages->links(/*'pagination::bootstrap-4'*/) }}
    </div>
    @endif
@endsection
