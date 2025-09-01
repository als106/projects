@extends('layouts.layout')

 

@section('title', 'Crear oferta')

 

@section('content')

<h1>Crear ofertas</h1>

 

@if (count($errors) > 0)

<ul>

    @foreach ($errors->all() as $error)

    <li>{{ $error }}</li>

    @endforeach

</ul>

@endif

 

<form action="{{ route ('sale_create_post') }}" method="POST" enctype="multipart/form-data">

 

    @csrf

    <select name="product" class="scrollable-dropdown" style="max-height:200px;overflow-y:auto;">

        @foreach($products as $a)

        <option>

            <p>{{ $a->name }}</p>

        </option>

        @endforeach

    </select>

    <label for="descuento">Descuento a aplicar:</label>

    <input type="number" name="descuento" id="descuento"><br>

    <button type="submit">Enviar</button>

</form>

 

@endsection