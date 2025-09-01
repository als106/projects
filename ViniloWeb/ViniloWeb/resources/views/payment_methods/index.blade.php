@extends('layouts.layout')

@section('content')
<div class="container mt-3 justify-content-center">
    <form action="{{ route('order_create_post', ['products' => $shoppingCart->products->pluck('id')->toArray(), 'status' => 'En Preparación']) }}" method="POST">
        @method('POST')
        @csrf
        <h1>Selecciona un método de pago</h1>
        <div class="card-deck">
            @forelse ($paymentMethods as $paymentMethod)
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row mt-3 mb-3 justify-content-center">
                        <h5 class="card-title">{{ $paymentMethod->name }}</h5>
                    </div>

                    <div class="row mt-3 mb-3 justify-content-center">
                        <a href="" target="_blank"><img style="width: 250px; height: 150px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);" src="{{ $paymentMethod->img }}" "></a>
                </div>
                <div class=" row mt-3 justify-content-center">
                            <p class="card-text">{{ $paymentMethod->description }}</p>
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-1">
                            <input type="radio" name="payment_method" id="payment_method_{{ $paymentMethod->id }}" value="{{ $paymentMethod->id }}" required>
                        </div>
                        <div class="col-4">
                            <label for="payment_method_{{ $paymentMethod->id }}" class="card-link">Seleccionar</label>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p>No hay métodos de pago disponibles.</p>
            @endforelse
        </div>
        <div class="row mt-3 justify-content-center">
            <button class="btn btn-danger" onclick="window.location='{{ route('Inicio') }}'">Cancelar pago</button>
            &nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Realizar pago</button>

        </div>
    </form>
</div>

@endsection