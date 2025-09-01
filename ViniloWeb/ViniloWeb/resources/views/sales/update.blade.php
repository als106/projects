@extends('layouts.layout')

@section('title', 'Modificar oferta')

@section('content')
    <h1>Si quieres modificar una oferta hazlo aquí :D</h1>
    @if (count($errors) > 0)
        <ul>
        @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif

    <form action="{{ route ('sale_update',['id' => $sale->id]) }}" method="POST" enctype="multipart/form-data">

        @method('PUT')

        @csrf

        
            @foreach($product as $a)

                @if($a->id==$sale->idProducto)
                <p>Producto: {{ $a->name }}</p>
                @endif

            @endforeach


        <p>Descuento: {{ $sale->descuento }}</p>

        <input type="number" name="descuento" id="descuento"><br>

        <button type="submit">Enviar</button>

    </form>

@endsection