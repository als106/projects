@extends('layouts.layout')

@section('title', 'Productos')

@section('content')

<div class="container">
  <h3 class="text" style="margin: 10px;"> TODOS LOS PRODUCTOS</h3>
  <hr>
  <div class="row">
    @foreach($products as $product)
    <div class="col-md-4">
      <div class="card mb-4">
        <a href="{{ route('products.detailed', $product->id) }}">
          <img class="card-img-top" src="{{ $product->img }}" alt="{{ $product->name }}">
        </a>
        <div class="card-body" style="background-color: #D7CABF;">
          <h5 class="card-title">{{ $product->name }}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $product->price }} €</h6>
          <div class="d-flex justify-content-between">
            <div>
              <form action="{{ route('shoppingcarts_store', ['products'=>$product->id]) }}" method="POST" class="my-4">
                @csrf
                <button class="btn btn-primary" style="background-color: #393d42;">
                  <img src="{{ asset('img/ViniloWeb_Shopping_Cart_Icon_2.png') }}" alt="Icono carrito" style="height: 18px;">
                  <span class="text-white" style="font-weight: bold;">Añadir al carrito</span>
                </button>
              </form>
            </div>
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
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection