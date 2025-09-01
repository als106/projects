@extends('layouts.layout')

@section('title', 'Artistas_filtrado')

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
    <form action="{{ route('artistas_select') }}" method="GET">
        @csrf

        <select name="genre" onchange="this.form.submit()">
            <option value="{{ $genre }}">Seleccionar género</option>
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
    <h3>Artistas {{ $genre }}</h3>

    <div class="row">
        @foreach($authors_filtred as $author)
        <div class="col-md-2">
            <div class="author">
                <a href="/author/{{ $author->id }}"><img style="width: 150px; height: 150px; border-radius: 10px;" src="{{ $author->img }}" alt="{{ $author->name }}"></a>
                <p style="font-family: Montserrat, sans-serif;">{{ $author->name }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>



<section class="container" style="margin-top: 20px;">
    <h3>Todos los artistas</h3>

    <div class="row">
        @foreach($authors as $author)
        <div class="col-md-2">
            <div class="author">
                <a href="/author/{{ $author->id }}"><img style="width: 150px; height: 150px; border-radius: 10px;" src="{{ $author->img }}" alt="{{ $author->name }}"></a>
                <p style="font-family: Montserrat, sans-serif;">{{ $author->name }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>



@endsection