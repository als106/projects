@extends('layouts.layout')

@section('title', 'Genre')

@section('content')

    <h1>Genre: {{ $genre->id }}</h1>

    <p><strong>Título</strong>: {{$genre->name}}</p>

@endsection