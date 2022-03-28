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
        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class='delete_form'>
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger mr-3"><i class="fa-solid fa-trash"></i> Elimina</button>
        </form>
        <a href=" {{ route('admin.posts.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-rotate-left"></i>
            Indietro
        </a>
    </div>
@endsection

@section('scripts')
    <script>
        const deleteForm = document.getElementById('delete_form')
        deleteForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const accept = confirm('Sei sicuro di eliminare questo post?')
            if (accept) e.target.submit();
        })
    </script>
@endsection
