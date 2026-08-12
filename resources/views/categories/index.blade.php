@extends('layout')

@section('content')
    <table class="table table-bordered table-striped">
        <thead class="text-center">
            <tr>
                <th>Nombre</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
