@extends('layouts.layout')

@section('title', 'Editar Pedido')

@section('content')
<h1>Editar pedido</h1>
<form method="POST" action="{{ route('order_update_post', $order->id) }} ">
    @csrf  
    @method('PUT')
    <input type="hidden" name="id" value="{{ $order->id }}">
    <label for="status">Estado:</label>
    <select name="status" id="status">
      @foreach(['CONFIRMADO', 'EN PREPARACIÓN', 'PREPARADO', 'ENTREGADO', 'ANULADO'] as $option)
        <option value="{{ $option }}" {{ $option == $order->status ? 'selected' : '' }}>{{ $option }}</option>
      @endforeach
    </select>
    <br>
    <label for="products">Productos:</label>
    <select name="products[]" id="products" multiple>
      @foreach($products as $product)
        <option value="{{ $product->id }}" {{ in_array($product->id, $orderProductsIds) ? 'selected' : '' }}>{{ $product->name }} ({{ $product->price }} €)</option>
      @endforeach
    </select>
    <br>
    <button type="submit">Actualizar pedido</button>
</form>
@endsection
