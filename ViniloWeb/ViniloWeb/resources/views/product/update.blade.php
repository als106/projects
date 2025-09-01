@extends('layouts.layout')

@section('title', 'Modificar producto')

@section('content')
    <h1>Si quieres modificar un producto hazlo aquí :D</h1>
    @if (count($errors) > 0)
        <ul>
        @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif

    <form action="{{ route ('product_update',['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <p>Título del Vinilo: {{ $product->name }}</p>
        <p>Precio del Vinilo: {{ $product->price }}</p>
        <label for="name">Nuevo título:</label>
        <input type="text" name="name" id="name"><br>
        <label for="price">Nuevo precio:</label>
        <input type="text" name="price" id="price"><br>
        <label>Portada: </label>
        <input type="file" name="image"><br>
        <select name="author">
            @foreach($authors as $a)
                <option><p>{{ $a->name }}</p></option>
            @endforeach
        </select>
        <select name="genre">
            @foreach($genres as $g)
                <option><p>{{ $g->name }}</p></option>
            @endforeach
        </select>
        <button type="submit">Enviar</button>

    </form>

@endsection