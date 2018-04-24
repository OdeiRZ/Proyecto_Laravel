<img class="img-thumbnail" src="{{ $message->image }}">
<div class="card-text">
    <div class="text-muted">
        Escrito por <a href="{{ $message->user->username }}">{{ $message->user->name }}</a>
        <span class="text-muted">({{ $message->created_at }})</span>
    </div>
    <p>
        {{ $message->content }}
        <a href="/messages/{{ $message->id }}">Leer más</a>
    </p>
</div>
