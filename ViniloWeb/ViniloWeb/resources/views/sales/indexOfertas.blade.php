@extends('layouts.layout')

@section('title', 'Ofertas')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/ofertas.css') }}">
</head>
<body>
    <div class="row justify-content-center">
        <h1><strong>Ofertas</strong></h1>
    </div>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <section class="container">
        <div class="row">
            @foreach($sales as $sale)
    
                <div class="targetofertas" >
                    @foreach($products as $p)
                        @if ($p->id==$sale->product_id)
                        <a href="/product/{{ $p->id }}" target="_blank"><img class="imagenofertas" src="{{ $p->img }}" alt="{{ $p->name }}"></a>
                        <span>{{ $p->name }}</span>
                        <span> Precio: <del><strong>{{ number_format($p->price, 2) }}</strong></del> <strong style="color:red">{{ number_format($p->price-$p->price*($sale->descuento/100), 2) }} € </strong></span>
                        <span> Descuento de <strong>{{ $sale->descuento }} %</strong></span>
                        @endif
                    @endforeach
                </div>
            
            @endforeach

        </div>
    </section>
</body>




@endsection

