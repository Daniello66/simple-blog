@extends('layout')

@section('content')
    <div class="align-items-center mb-4">
        <h1 class="display-3">{{ $post->title }}</h1>
        <div class="d-block w-fit badge bg-dark mt-2 align-items-center">{{ $post->category->name }}</div>
    </div>

    <p>{{ $post->content }}</p>

    <small class="d-block text-muted mt-4">{{ $post->user->fullname }} | {{ $post->created_at }}</small>
@endsection
