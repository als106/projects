@extends('layouts.layout')

@section('title', 'Crear review')

@section('content')


@if (count($errors) > 0)
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<div class="d-flex flex-column align-items-center justify-content-center" style="margin: 50px;">
    <h1 style="margin-left: 5px;">Escribir una review</h1>
    <img src="{{ asset($product->img) }}" alt="{{ $product->name }}" width="200px" height="200px" style="border-radius:15px; float: left; margin-bottom: 15px;">
    <form action="{{ route ('review_post', ['id' => $id]) }}" method="POST">

        @csrf
        <label for="review">Reseña:</label>
        <input type="text" name="review" id="review"><br>
        <label for="opciones">Valoración:</label>
        <select name="opciones" id="opciones">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button type="submit">Enviar</button>

    </form>
</div>

@endsection