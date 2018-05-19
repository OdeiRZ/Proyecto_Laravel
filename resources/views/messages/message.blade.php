<img class="img-thumbnail" src="{{ $message->image }}">
<div class="card-text">
    <div class="text-muted">
        {{ __('message.written') }}: <a href="{{ $message->user->username }}">{{ $message->user->name }}</a>
        <span class="text-muted">({{ $message->created_at }})</span>
    </div>
    <p>
        {{ $message->content }}
        <a href="/messages/{{ $message->id }}">{{ __('message.more') }}</a>
    </p>
</div>

<script>
    window.trans = <?php
        $lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
        $trans = [];
        foreach ($lang_files as $f) {
            $filename = pathinfo($f)['filename'];
            $trans[$filename] = trans($filename);
        }
        echo json_encode($trans); ?>;
</script>
