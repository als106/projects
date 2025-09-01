@extends('layouts.layout')

@section('title', 'Explorar estilos musicales')

@section('content')

<section class="container" style="margin-top: 20px;">
    <form action="{{ route('genre.filtro') }}" method="GET">
        @csrf

        <select name="genre" onchange="this.form.submit()">
            <option value="">Buscar</option>
            @foreach($genres as $g)
            <option value="{{ $g->name }}">{{ $g->name }}</option>
            @endforeach
        </select>
    </form>
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
