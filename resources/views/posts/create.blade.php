@extends('layout')

@section('content')
    <h2 class="display-5 mb-5">Crear post</h2>

    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-6">
                <label for="title" class="mb-2">Título</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="col-6">
                <label for="category_id" class="mb-2">Categoría</label>

                <select id="category_id" name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <label for="content" class="mb-2">Contenido</label>
                <textarea id="content" name="content" class="form-control" rows="3" required></textarea>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Crear</button>
                <button type="button" class="btn btn-secondary" onclick="window.location = '/posts'">Cancelar</button>
            </div>
        </div>
    </form>
@endsection
