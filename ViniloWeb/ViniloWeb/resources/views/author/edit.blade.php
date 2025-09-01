@extends('layouts.layout')

@section('title', 'Modificar Author')

@section('content')
    <h1>Modificar Autor</h1>


    <form action="{{ route ('update_author', ['id' => $author->id]) }}" method="POST">
        @method('PATCH')
        @csrf
        <label>
            <strong>Nombre: </strong> <br>
            <input type="text" name="name" value="{{old('name', $author->name)}} ">
            @error('name') 
            <br>
            <small style="color: red">{{$message}}</small>
            @enderror
        </label> <br>
        <label>
            <strong>Nueva Descripción: </strong> <br>
            <textarea name="description">{{old('description', $author->description)}}</textarea>
            @error('description')
            <br>
            <small style="color: red">{{$message}}</small>
            @enderror
             
        </label> <br>

        <button type="submit">Enviar</button>
        

    </form>

@endsection