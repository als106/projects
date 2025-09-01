@extends('layouts.layout')

@section('title', 'Contactanos')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/contactanos.css') }}">
</head>

<div class="row justify-content-center" style="margin-top: 15px;">
    <h1>CONTACTAR</h1>
</div>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<section class="container">
    <div class="form-group">
        <form action="{{ route('contactanos_send') }}" method="POST">
            @csrf

            <!-- Campos del formulario -->
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" style="border-radius: 10px;">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" style="border-radius: 10px;">

            <label for="telefono">Telefono(opcional):</label>
            <input type="telefono" name="telefono" id="telefono" style="border-radius: 10px;">

            <label for="mensaje">Mensaje:</label>
            <textarea name="mensaje" id="mensaje" style="border-radius: 10px;"></textarea>

            <button type="submit">Enviar</button>
        </form>
    </div>
</section>




@endsection