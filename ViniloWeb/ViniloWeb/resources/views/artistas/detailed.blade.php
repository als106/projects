@extends('layouts.layout')

@section('name', 'Vista detalle del Autor')

@section('content')

<div class="d-flex align-items-center justify-content-center" style = "margin: 50px;">
        <div class="mr-3 text-center">
            <img style="border-radius: 25px;"src="{{ asset($author->img) }}" alt="{{ $author->name }}" width="400">
        </div>
        <div class="d-flex flex-column">
            <h3 style="font-weight: bold; ">{{ $author->name }}</h3>
            <div class="genre-box" style="border: 1px solid #ccc; padding: 5px; margin-top: 10px; max-width: 150px;">
                <p class="genre-text1" style="font-size: 12px; margin: 0;"> Genero:</p>
                <p class="genre-text" style="font-weight: bold; text-indent: 1em; font-size: 18px; margin: 0;">{{$genre->name }}</p>
            </div> 
            <div class="desc_box" style=" padding: 5px; margin-top: 10px; max-width: 600px;">
                    <p class="desc-text1" style="font-size: 12px; margin: 0;"> Descripción:</p>
                    <p class="desc-text" style="text-indent: 1em; font-size: 18px; margin: 0;">{{$author->description }}</p>
                </div>
        </div>
    </div>
</div>
<hr>
<div class="d-flex align-items-center justify-content-center" style = "margin: 50px;">
<section class="container">
    <h2>Discos del artista</h2>

    <div class="row">
        @foreach($products as $product)
        <div class="col-md-2">
            <div class="products">
                <a href="{{ route('products.detailed', ['id'=>$product->id])}}"><img style="width: 150px; height: 150px; border-radius: 10px;" src="{{ $product->img }}" alt="{{ $product->name }}"></a>
                <p>{{ $product->name }}</p>
            </div>
        </div>
        @endforeach

    </div>

</section>
</div>
@endsection
