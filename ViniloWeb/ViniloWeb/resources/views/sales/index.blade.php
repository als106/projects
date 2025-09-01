@extends('layouts.layout')

@section('title', 'Listar Ofertas')

@section('content')
<div class="container py-4">
    <h1>Listado de Ofertas</h1>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row mb-4">
        <a href="{{ url('/admin') }}"  style="padding: 0;">
            <img src="/img/flecha.png" alt="Flecha"  width="40" height="40">
        </a> 
        <div>
            <form action="{{ route('sale_create_get') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-success">Añadir</button>
            </form>
        </div>
    </div>

    <div class="row">
        @foreach ($products as $pos => $p)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title">{{ $p->name }}</h5>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <p class="card-text">{{ $p->description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Autor: {{ $p->author->name }}</li>
                        <li class="list-group-item">Género: {{ $p->genre->name }}</li>
                        <li class="list-group-item">Precio: {{ number_format($p->price-$p->price*($sales[$pos]->descuento/100), 2) }} €</li>
                        <li class="list-group-item">Descuento: {{ $sales[$pos]->descuento }} %</li>
                        <li class="list-group-item">Stock: {{ $p->stock->stock }}</li>
                    </ul>
                    <div class="card-body d-flex justify-content-between">
                        <form action="{{ route('products_show', ['id'=>$p->id]) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-primary">Ver</button>
                        </form>  
                        <a class="btn btn-primary" href="{{route('sale_update_get', ['id'=>$sales[$pos]->id])}}">Editar oferta</a> 
                        <form action="{{ route('delete_sale', ['id'=>$sales[$pos]->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar oferta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection