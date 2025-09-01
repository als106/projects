@extends('layouts.layout')

@section('title', $genre->name . ' - Productos')

@section('content')

<div class="container">
  <h3 class="text" style="margin: 10px;"> Productos de {{ $genre->name }}</h3>
  <hr>
  <div class="row">
    @foreach ($genre->products as $product)
    <div class="col-md-4">
      <div class="card mb-4">
        <a href="{{ route('products.detailed', $product->id) }}">
          <img class="card-img-top" src="{{ $product->img }}" alt="{{ $product->name }}">
        </a>
        <div class="card-body", style = "background-color: #D7CABF;">
          <h5 class="card-title">{{ $product->name }}</h5>
          <div class="d-flex justify-content-between">
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