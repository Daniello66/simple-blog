@extends('layout')

@section('content')
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="border border-secondary rounded-2 p-3 mb-3">
                <div class="fw-bold">{{ $post->title }}</div>

                <p class="mt-1">{{ $post->content }}</p>

                <div class="d-block w-fit badge bg-dark mt-2">{{ $post->category->name }}</div>

                <small class="d-block text-muted mt-3">{{ $post->user->fullname }} | {{ $post->updated_at }}</small>
            </div>
        @endforeach
    @else
        <div class="alert alert-primary">
            Aún no existen publicaciones, crea una <a href="{{ route('posts.create') }}" class="text-decoration-underline">aquí</a>.
        </div>
    @endif
@endsection
