@extends('layouts.layout')

@section('name', 'Vista detalle del Autor')

@section('content')

    <h1>Listado de Autores</h1>
    <body>
        <p><strong>Nombre</strong>: {{$author->name}}</p>
        <p><strong>Descripción</strong>: {{$author->description}}</p>
    </body>



@endsection
