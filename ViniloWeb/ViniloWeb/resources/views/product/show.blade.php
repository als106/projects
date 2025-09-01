@extends('layouts.layout')

@section('title', 'Producto Detallado')

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="btn">
    <form action="{{ route('products_index') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary mr-2">Volver a productos</button>
    </form>
</div>
<div class="d-flex align-items-center justify-content-center" style="margin: 50px;">
    <div class="mr-3 text-center">
        <img src="{{ asset($product->img) }}" alt="{{ $product->name }}" width="600" style="border-radius:55px;">
    </div>
    <div class="d-flex flex-column">
        <div class="d-flex align-items-center">
            <h3 style="font-weight: bold; margin-right: 20px;">{{ $product->name }}</h3>

        </div>

        <!-- MEJORA: Enlace a descripcion del artista (donde deberia aparecer la foto del artista)-->
        <h3>{{ $product->author->name }}</h3>
        <p style="font-weight: bold; font-size: 20px; ">
             {{$product->price}}
            </p>

        <div class="genre-box" style="border: 1px solid #ccc; padding: 5px; margin-top: 10px; max-width: 150px;">
            <p class="genre-text1" style="font-size: 12px; margin: 0;"> Genero:</p>
            <p class="genre-text" style="font-weight: bold; text-indent: 1em; font-size: 12px; margin: 0;">{{ $product->genre->name }}</p>
        </div>


    </div>
</div>

@endsection
