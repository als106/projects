@extends('layouts.layout')

@section('title', 'Crear pedido')

@section('content')
<h1>Añadir pedido</h1>
@if (count($errors) > 0)
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif

<form action="{{ route('order_create_post') }}" method="POST">
  @csrf
  <label for="status">Estado:</label>
  <select name="status" id="status">
    @foreach(['EN PREPARACIÓN', 'PREPARADO', 'CONFIRMADO', 'ENTREGADO', 'ANULADO'] as $option)
      <option value="{{ $option }}">{{ $option }}</option>
    @endforeach
  </select>
  <br>
  <label for="products">Productos:</label>
  <select name="products[]" id="products" multiple>
    @foreach($products as $product)
      <option value="{{ $product->id }}">{{ $product->name }} ({{ $product->price }} €)</option>
    @endforeach
  </select>
  <br>
  <button type="submit">Realizar pedido</button>
</form>
@endsection
