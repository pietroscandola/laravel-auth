@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>

    <p>{{ $post->content }}</p>
    <div>
        <time>Creato il: {{ $post->created_at }}</time>
    </div>
    @if ($post->image)
        <img src="{{ $post->image }}" alt="{{ $post->slug }}">
    @endif

    <hr>
    <div class="d-flex align-items-center justify-content-end">
        <a href=" {{ route('admin.posts.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-rotate-left"></i>
            Indietro
        </a>

    </div>
@endsection
