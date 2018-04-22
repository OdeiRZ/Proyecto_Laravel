@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Proyecto Laravel</h1>
    <nav>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
        </ul>
    </nav>
</div>
<div class="row">
    @forelse($mensajes as $mensaje)
        <div class="col-6">
            <img class="img-thumbnail" src="{{ $mensaje['imagen'] }}">
            <p class="card-text">
                {{ $mensaje['contenido'] }}
                <a href="/mensajes/{{ $mensaje['id'] }}">Leer más</a>
            </p>
        </div>
    @empty
        <p>No hay mensajes destacados</p>
    @endforelse
</div>
@endsection
