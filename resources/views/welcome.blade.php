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
    <form action="/mensajes/crear" method="post">
        <div class="form-group">
            {{ csrf_field() }}
            <input class="form-control @if($errors->has('mensaje')) is-invalid @endif" type="text" name="mensaje" placeholder="Escribe algo">
            @if ($errors->has('mensaje'))
                @foreach($errors->get('mensaje') as $error)
                <div class="invalid-feedback">{{ $error }}</div>
                @endforeach
            @endif
        </div>
    </form>
</div>
<div class="row">
    @forelse($mensajes as $mensaje)
        <div class="col-6">
            <img class="img-thumbnail" src="{{ $mensaje->imagen }}">
            <p class="card-text">
                {{ $mensaje->contenido }}
                <a href="/mensajes/{{ $mensaje->id }}">Leer más</a>
            </p>
        </div>
    @empty
        <p>No hay mensajes destacados</p>
    @endforelse

    @if(count($mensajes))
        <div class="mt-2 mx-auto">
            {{ $mensajes->links(/*'pagination::bootstrap-4'*/) }}
        </div>
    @endif
</div>
@endsection
