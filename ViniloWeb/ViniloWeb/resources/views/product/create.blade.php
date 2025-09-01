@extends('layouts.layout')

@section('title', 'Crear producto')

@section('content')
<h1>Si quieres añadir un album hazlo aquí :D</h1>

@if (count($errors) > 0)
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="{{ route ('product_create_post') }}" method="POST" enctype="multipart/form-data">

    @csrf
    <label for="name">Título del album:</label>
    <input type="text" name="name" id="name"><br>
    <label for="price">Precio del vinilo:</label>
    <input type="text" name="price" id="price"><br>
    <label>Portada: </label>
    <input type="file" name="image"><br>
    <select name="author" class="scrollable-dropdown" style="max-height:200px;overflow-y:auto;">
        @foreach($authors as $a)
        <option>
            <p>{{ $a->name }}</p>
        </option>
        @endforeach
    </select>
    <select name="genre">
        @foreach($genres as $g)
        <option>
            <p>{{ $g->name }}</p>
        </option>
        @endforeach
    </select>
    <button type="submit">Enviar</button>

</form>

@endsection