@extends('layouts.layout')

@section('title', 'Inicio')

@section('content')

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ __('¡Error! No tienes compras realizadas.') }}
    </div>
@endif


<head>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}" >
</head>

<div class="slider-wrapper">
    <div class="slider">
        <a href="/novedades" target="_blank"><img id="img1" src="img/banners/novedades.png" alt=""></a>
        <a target="_blank"><img id="img2" src="img/banners/anuncio.png" alt=""></a>
        <a href="/artistas" target="_blank"><img id="img3" src="img/banners/artistas.png" alt=""></a>
    </div>
    <div class="slider-nav">
        <a href="#img1"></a>
        <a href="#img2"></a>
        <a href="#img3"></a>
    </div>
</div>


<div class="container-fluid" style="padding: 0 50px 0 ">
    <div class="row">
        <div class="col-8">
            <h3 class="text-muted" style="font-weight: bold;">Productos</h3>
        </div>
        <div class="col-4 text-right">
            <a href="/all" style="font-weight: bold;  font-size: 20px; color: grey; text-decoration: underline;" class="btn btn-link">VER TODOS LOS PRODUCTOS</a>
        </div>
    </div>
    <hr>
    <div class="row" >
        @foreach($products as $product)
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mb-4">
                <div class="card h-100 shadow-sm" style="border: none; border-radius: 10px; background-color: #EDE4DB;">
                    <a href="{{ route('products.detailed', $product->id) }}">
                        <img class="card-img-top" style="height: 300px; width: 300px; object-fit: cover; border-radius: 10px;" src="{{ $product->img }}" alt="{{ $product->name }}">
                    </a>
                    <div class="card-body">
                        <h6 class="card-title mb-1 text-center" style="font-weight: bold; font-size: 20px; color: #333;">{{ $product->name }}</h6>
                    </div>
                </div>
            </div>
        @endforeach 
    </div>
</div>

<hr>

<div class="container-fluid" style="padding:20px 50px 50px;">
    <a href="/ofertas">
        <img src="img/banners/ofertas.png" alt="Ofertas" class="img-fluid w-100">
    </a>        
</div>



@endsection