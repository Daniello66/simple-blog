@extends('layout')

@section('content')
    <h2 class="display-6 mb-2">Publicaciones</h2>

    <div class="mb-4">
        <h4 class="mb-1">Categorías:</h4>

        <a href="{{ route('posts.index') }}">
            <div class="w-fit badge bg-primary">Todas</div>
        </a>

        @foreach ($categories as $category)
            <a href="{{ route('posts.index', ['category_id' => $category->id]) }}">
                <div class="w-fit badge bg-primary">{{ $category->name }}</div>
            </a>
        @endforeach
    </div>

    <div class="mb-4">
        <a href="{{ route('posts.create') }}" role="button" class="btn btn-primary">Crear</a>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="border border-secondary rounded-2 p-3 mb-3">
                <div class="row">
                    <div class="col-8">
                        <a href="{{ route('posts.show', $post->id) }}" class="fw-bold">{{ $post->title }}</a>
                    </div>

                    <div class="col-4 text-end">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-primary underline me-2">Ver</a>

                        @if (Auth::id() === $post->user_id)
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-primary underline me-2">Editar</a>
                            <a href="{{ route('posts.destroy', $post->id) }}" class="text-danger underline">Eliminar</a>
                        @endif
                    </div>
                </div>

                <p class="mt-1">{{ $post->content }}</p>

                <div class="d-block w-fit badge bg-dark mt-2">{{ $post->category->name }}</div>

                <small class="d-block text-muted mt-3">{{ $post->user->fullname }} | {{ $post->created_at }}</small>
            </div>
        @endforeach
    @else
        <div class="alert alert-primary">
            Aún no existen publicaciones, crea una <a href="{{ route('posts.create') }}" class="underline">aquí</a>.
        </div>
    @endif
@endsection
