@extends('layouts.layout')

@section('title', 'Crear género')

@section('content')
    <h1>Si quieres añadir un género hazlo aquí :D</h1>

    @if (count($errors) > 0)
        <ul>
        @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif

    <form action="{{ route ('genre_create_post') }}" method="POST">
        
        @csrf
        <label for="name">Género:</label>
        <input type="text" name="name" id="name"><br>

        <button type="submit">Enviar</button>
    </form>

@endsection