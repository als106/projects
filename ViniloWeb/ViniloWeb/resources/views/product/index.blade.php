@extends('layouts.layout')

@section('title', 'Listar Productos')

@section('content')
<div class="container py-4">
    <h1>Listado de Productos</h1>

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
            <form action="{{ route('products_index_sorted') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary">Ordenar</button>  
            </form>
        </div>
        <div>
            <form action="{{ route('product_create_get') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-success">Añadir</button>
            </form>
        </div>
    </div>

    <div class="row">
        @foreach ($products as $p)
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
                        <li class="list-group-item">Precio: {{ $p->price }} €</li>
                        <li class="list-group-item">Stock: {{ $p->stock->stock }}</li>
                    </ul>
                    <div class="card-body d-flex justify-content-between">
                        <form action="{{ route('products_show', ['id'=>$p->id]) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-primary">Ver</button>
                        </form>
                        <a class="btn btn-primary" href="{{route('product_update_get', ['id'=>$p->id])}}">Editar</a>  
                        <form action="{{ route('delete_product', ['id'=>$p->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if(isset($name))
    {{ $products->appends(['sort' => $name])->links() }}
    @else
    {{ $products->links() }}
    @endif
</div>
@endsection