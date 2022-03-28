@extends('layouts.app')

@section('content')
    <header>
        <h1>I miei Posts</h1>
    </header>
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.posts.create') }}" class="btn btn-success">
            <i class="fa-solid fa-plus"></i>
            Crea un Nuovo Post
        </a>
    </div>
    @if (session('message'))
        <div class="alert alert-{{ session('type') ?? 'info' }}">
            {{ session('message') }}
        </div>
    @endif
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Created at</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-sm btn-primary mr-3">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class='delete_form'>
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger mr-3">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-warning">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <h3>Non ci sono posts</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if ($posts->hasPages())
        {{ $posts->links() }}
    @endif
@endsection

@section('scripts')
    <script src={{ asset('js/delete-confirm.js') }} defer></script>
@endsection
