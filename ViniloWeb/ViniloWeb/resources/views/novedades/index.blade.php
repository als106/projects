@extends('layouts.layout')

@section('title', 'Novedades')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/novedades.css') }}">
</head>
<div class="row justify-content-center">
    <h1><strong>Novedades</strong></h1>
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

<body>
    <section class="container">
        <div class="slider-wrapper">
            <div class="slider">
                <a href="/product/6" target="_blank"><img id="img1" src="/img/img4_banner.jpg" alt=""></a>
                <a href="/product/7" target="_blank"><img id="img2" src="/img/img5_banner.jpg" alt=""></a>
                <a href="/product/9" target="_blank"><img id="img3" src="/img/img7_banner.jpg" alt=""></a>
                <a href="/product/4" target="_blank"><img id="img4" src="/img/img2_banner.jpg" alt=""></a>
            </div>
            <div class="slider-nav">
                <a href="#img1"></a>
                <a href="#img2"></a>
                <a href="#img3"></a>
                <a href="#img4"></a>
            </div>
        </div>
    </section>




</body>

<section class="container">
    <h2>ÚLTIMAS NOVEDADES</h2>

    <div class="row">
        @foreach($products as $product)
        <div class="col-md-2">
            <div class="products">
                <a href="/product/{{ $product->id }}" target="_blank"><img style="width: 150px; height: 150px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);" src="{{ $product->img }}" alt="{{ $product->name }}"></a>
                <p>{{ $product->name }}</p>
            </div>
        </div>
        @endforeach

    </div>
    {{ $products->links() }}
</section>



<section class="container">
    <h2>NOVEDADES MÁS VENDIDAS</h2>

    <div class="row">
        @foreach($productsMostSold as $product)
        <div class="col-md-2">
            <div class="productsMostSold">
                <a href="/product/{{ $product->id }}" target="_blank"><img style="width: 150px; height: 150px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);" src="{{ $product->img }}" alt="{{ $product->name }}"></a>
                    <p>{{ $product->name }}</p>
            </div>
        </div>
        @endforeach

    </div>
    {{ $productsMostSold->links() }}
</section>




@endsection

