@extends('layouts.layout')

@section('content')

<div class="container">
    @if(session()->get('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <div class="mb-4 mt-4">
        <h4 class="text-left">Favoritos ({{ count($wishlist->products) }})</h4>
        <hr>
    </div>

    @if(count($wishlist->products) > 0)
    <div class="row">
        @foreach($wishlist->products as $product)
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
                            <form action="{{ route('shoppingcarts_store', ['products'=>$product->id]) }}" method="POST">
                                @csrf
                                <button class="btn btn-primary" style="background-color: #393d42;">
                                    <img src="{{ asset('img/ViniloWeb_Shopping_Cart_Icon_2.png') }}" alt="Icono carrito" style="height: 18px;">
                                    <span class="text-white" style="font-weight: bold;">Añadir al carrito</span>
                                </button>
                            </form>
                        </div>
                        <form action="{{ route('wishlist_remove', ['product'=>$product->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div>
                                <button class="btn btn-outline-secondary" type="submit">Eliminar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p>No tienes productos en tu lista de deseos.</p>
    @endif
</div>

@endsection