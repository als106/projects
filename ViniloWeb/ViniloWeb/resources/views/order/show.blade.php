@extends('layouts.layout')

@section('title', 'Detalle Pedido')

@section('content')
  <h1>Detalle del pedido #{{ $order->id }}</h1>
  <p><strong>Estado:</strong> {{ $order->status }}</p>
  <p><strong>Fecha de creación:</strong> {{ $order->created_at }}</p>
  <p><strong>Productos:</strong></p>
  <ul>
    @foreach($order->products as $product)
      <li>{{ $product->name }} ({{ $product->price }} €)</li>
    @endforeach
  </ul>
@endsection
