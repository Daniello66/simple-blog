@extends('layout')

@section('content')
    <table class="table table-bordered table-striped">
        <thead class="text-center">
            <tr>
                <th>Título</th>
                <th>Contenido</th>
                <th>Categoría</th>
                <th>Autor</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->category_id }}</td>
                <td>{{ $post->user_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
