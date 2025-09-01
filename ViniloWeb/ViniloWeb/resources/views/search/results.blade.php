@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h2>Resultados de búsqueda:</h2>
    @if ($products->count() == 0)
    <p>No se encontraron productos con el término de búsqueda "{{ $query }}".</p>
    @else
    <section class="container" style="margin-top: 20px;">
        <h4>Álbumes</h4>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4">
      <div class="card mb-4" style="box-shadow: 0 2px 3px rgba(0, 0, 0, 0.4);">
        <a href="{{ route('products.detailed', $product->id) }}">
          <img class="card-img-top" src="{{ $product->img }}" alt="{{ $product->name }}">
        </a>
        <div class="card-body">
          <h5 class="card-title">{{ $product->name }}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $product->price }} €</h6>
          <div class="d-flex justify-content-between">
            <div>
              <button class="btn btn-primary" style="background-color: #393d42;">
                <img src="{{ asset('img/ViniloWeb_Shopping_Cart_Icon_2.png') }}" alt="Icono carrito" style="height: 18px;">
                <span class="text-white" style="font-weight: bold;">Añadir al carrito</span>
              </button>
            </div>
            @if(app('App\Http\Controllers\WishlistController')->hasProduct($product))
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
    </section>
    @endif

    @if ($authors->count() == 0)
    <p>No se encontraron autores con el término de búsqueda "{{ $query }}".</p>
    @else
    <section class="container" style="margin-top: 20px;">
        <h4>Artistas</h4>
        <div class="row">
            @foreach($authors as $author)
            <div class="col-md-2">
                <div class="author">
                    <a href="{{ route('artistas_show', ['id'=>$author->id])}}"><img style="width: 150px; height: 150px; border-radius: 10px;" src="{{ $author->img }}" alt="{{ $author->name }}"></a>
                    <p style="font-family: Montserrat, sans-serif;"><strong>{{ $author->name }}</strong></p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
</div>
@endsection