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

<div class="d-flex align-items-center justify-content-center" style="margin: 50px;">
    <div class="mr-3 text-center">
        <img src="{{ asset($product->img) }}" alt="{{ $product->name }}" width="600" style="border-radius:55px;">
    </div>
    <div class="d-flex flex-column">
        <div class="d-flex align-items-center">
            <h3 style="font-weight: bold; margin-right: 20px;">{{ $product->name }}</h3>

            @if(Auth::check() && app('App\Http\Controllers\WishlistController')->hasProduct($product))
            <form action="{{ route('wishlist_remove', ['product'=>$product->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn" style="background-color: transparent; border: none;">
                    <img src="{{ asset('img/heart_relleno.png') }}" alt="Icono de favorito" style="height: 30px; width: auto;">
                </button>
            </form>
            @else
            <form action="{{ route('wishlist_add', ['product'=>$product->id]) }}" method="POST">
                @csrf
                <button class="btn" style="background-color: transparent; border: none;">
                    <img src="{{ asset('img/heart_negro.png') }}" alt="Icono 2 de favorito" style="height: 30px; width: auto;">
                </button>
            </form>
            @endif
        </div>

        <!-- MEJORA: Enlace a descripcion del artista (donde deberia aparecer la foto del artista)-->
        <h3>{{ $product->author->name }}</h3>
        <p style="font-weight: bold; font-size: 20px; ">
            @if($oferta!=0)
                    
                    <del>{{number_format($product->price, 2) }}</del> <strong style="color:red">{{number_format($product->price-$product->price*($oferta/100), 2) }} €</strong>
            @else
                    <strong>{{number_format($product->price-$product->price*($oferta/100), 2) }} €</strong>
            @endif
            </p>

        <div class="genre-box" style="border: 1px solid #ccc; padding: 5px; margin-top: 10px; max-width: 150px;">
            <p class="genre-text1" style="font-size: 12px; margin: 0;"> Genero:</p>
            <p class="genre-text" style="font-weight: bold; text-indent: 1em; font-size: 12px; margin: 0;">{{ $product->genre->name }}</p>
        </div>
        <div class="container" style="margin-top: 5px;">
            @if($score == 5)
            <img src="/img/score/score_5.png" alt="score_5" width="75px" height="100px">
            @elseif($score >= 4)
            <img src="/img/score/score_4.png" alt="score_4" width="75px" height="100px">
            @elseif($score >= 3)
            <img src="/img/score/score_3.png" alt="score_3" width="75px" height="100px">
            @elseif($score >= 2)
            <img src="/img/score/score_2.png" alt="score_2" width="75px" height="100px">
            @else
            <img src="/img/score/score_1.png" alt="score_1" width="75px" height="100px">
            @endif
        </div>

        <form action="{{ route('review_index', ['id'=>$product->id]) }}" method="GET" class="my-2">
            @csrf
            <button class="btn btn-primary btn-block" style="background-color: #D32626;">
                <span class="text-white" style="font-weight: bold;">Ver REVIEWS</span>
            </button>
        </form>

        <form action="{{ route('shoppingcarts_store', ['products'=>$product->id]) }}" method="POST" class="my-4">
            @csrf
            <button class="btn btn-primary btn-block" style="background-color: #393d42;">
                <img src="{{ asset('img/ViniloWeb_Shopping_Cart_Icon_2.png') }}" alt="Icono carrito" style="height: 18px; width: auto; margin-right: 10px;">
                <span class="text-white" style="font-weight: bold;">Añadir al carrito</span>
            </button>
        </form>

        <p style="font-size: 12px;"> Disponible <span style="margin-right: 150px;"></span> Envío en 3-4 días </p>

        <div>
            <p class="text" style="font-size: 12px; margin: 0;"><img src="{{ asset('img/ok.png') }}" style="height: 25px; width: auto; "> Dedicatoria del artista</p>
            <p class="text" style="font-size: 12px; margin: 0;"><img src="{{ asset('img/ok.png') }}" style="height: 25px; width: auto; "> Sello de calidad</p>
            <p class="text" style="font-size: 12px; margin: 0;"><img src="{{ asset('img/ok.png') }}" style="height: 25px; width: auto; "> Garantía 2 años</p>
            <p class="text" style="font-size: 12px; margin: 0;"><img src="{{ asset('img/ok.png') }}" style="height: 25px; width: auto; "> Devolución gratuita</p>
        </div>
    </div>
</div>
</div>

@endsection