@extends('layouts.app')

@section('content')
    <h1 class="h3">{{ $user->name }}</h1>
    <div class="row">
        @forelse($follows as $follow)
        <div class="col-6">
            {{ $follow->username }}
        </div>
        @empty
        <p class="col-6 pt-3">{{ __('follows.no-followers') }}</p>
        @endforelse
    </div>
@endsection
