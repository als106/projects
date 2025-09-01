@extends('layouts.layout')

@section('title', 'Carrito de la compra')

@section('content')
<div class="row mt-3 justify-content-center">
    <h1>Carrito de la compra</h1>
</div>
<div class="container mt-3 justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio unitario</th>
                <th scope="col">Precio total</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($s->products))
                @foreach ($s->products as $p)
                <tr>
                    <th scope="row">{{ $p->id }}</th>
                    <td>{{ $p->name }}</td>
                    <td>{{ $s->products()->where('product_id', $p->id)->sum('quantity')}}</td>
                    <td>{{ $p->price}}$</td>
                    <td>{{ $p->price * $s->products()->where('product_id', $p->id)->sum('quantity')}}$</td>
                    <form action="{{ route('shoppingcarts_destroy_product', ['productID'=>$p->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <td><button class="btn btn-danger mt-0" onmouseover="" style="cursor: pointer;">borrar</button></td>
                    </form>
                </tr>
                @endforeach
            @endif
        </tbody>
        
    </table>
    <hr>
    <div class="row pd-3 pt-3">
        &nbsp;
        &nbsp;
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Productos</th>
                <th scope="col">Precio Total</th>
                <th scope="col justify-content-center">Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $s->id }}</th>
                <td>{{ $s->products->count() }}</td>
                <td>{{ $total }}$</td>
                <form action="{{ route('shoppingcarts_clean') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <td class="col-1"><button class="btn btn-danger mt-0 " onmouseover="" style="cursor: pointer;">Vaciar</button></td>
                </form>
                <form action="{{ route('payment_methods.index') }}" method="GET">
                    @method('POST')
                    @csrf
                <td><button type="submit" class="btn btn-primary" style="cursor: pointer;">Realizar compra</button></td>
                </form>
            </tr>
        </tbody>
    </table>
    <hr>
</div>
@endsection