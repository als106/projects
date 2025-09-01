@extends('layouts.layout')

@section('title', 'Filtro')

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<section class="container" style="margin-top: 20px;">
    <form action="{{ route('genre.filtro') }}" method="GET">
        @csrf

        <select name="genre" onchange="this.form.submit()">
            <option value="{{ $genre }}">Buscar</option>
            @foreach($genres as $g)
            @if($g->name == $genre)
            <option value="{{ $g->name }}" selected>{{ $g->name }}</option>
            @else
            <option value="{{ $g->name }}">{{ $g->name }}</option>
            @endif
            @endforeach
        </select>
    </form>
</section>
<section class="container" style="margin-top: 20px;">
    <h3>Productos {{ $genre }}</h3>

    <div class="row">
        @foreach($products as $product)
        <div class="col-md-2">
            <div class="product">
                <a href="/product/{{ $product->id }}"><img style="width: 150px; height: 150px; border-radius: 10px;" src="{{ $product->img }}" alt="{{ $product->name }}"></a>
                <p style="font-family: Montserrat, sans-serif;">{{ $product->name }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

<div class="container">
    <h3 class="text" style="margin: 10px;">Explorar estilos musicales</h3>
    <hr>
    <div class="row">
        @foreach ($genres as $genre)
        <div class="col-md-2">
            <a href="{{ route('genres.products', $genre->id) }}">
                <img src="{{ $genre->img }}" alt="{{ $genre->name }}" class="img-fluid rounded" style="border-radius: 5px;">
            </a>
        </div>
        @endforeach
    </div>
    <hr>
</div>

@endsection