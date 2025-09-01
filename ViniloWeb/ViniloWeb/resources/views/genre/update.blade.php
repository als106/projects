@extends('layouts.layout')

@section('title', 'Modificar género')

@section('content')
    <h1>Si quieres modificar un género hazlo aquí :D</h1>
    @if (count($errors) > 0)
        <ul>
        @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif

    <form action="{{ route ('genre_update', $genre->id) }}" method="POST">
        @method('PUT')
        @csrf
        <p>Nombre del género: {{ $genre->name }}</p>
        <label for="name">Género:</label>
        <input type="text" name="name" id="name"><br>
        <button type="submit">Enviar</button>

    </form>

@endsection