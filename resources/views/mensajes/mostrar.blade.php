@extends('layouts.app')

@section('content')
    <h1 class="h3">Id: {{ $mensaje->id }}</h1>
    <img class="img-thumbnail" src="{{ $mensaje->imagen }}">
    <p class="card-text">
        {{ $mensaje->contenido }}
        <small class="text-muted">{{ $mensaje->created_at }}</small>
    </p>
@endsection
