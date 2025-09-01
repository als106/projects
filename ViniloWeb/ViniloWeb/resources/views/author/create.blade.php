@extends('layouts.layout')

@section('title', 'Formulario crear')

@section('content')

    <h1>Añadir Autor</h1>
    <form action="{{ route('store_author') }}" method="POST">
        @csrf
        <label>
            Nombre <br>
            <input name="name" type="text" value="{{old('name')}}">
            <br>
            @error('name')
                <small style="color:red">*{{ $message }}</small>
            @enderror
        </label> <br>
        <label>
            Descripción <br>
            <textarea name="description"> </textarea>
            <br>
            @error('description')
                <small style="color:red">*{{ $message }}</small>
            @enderror
        </label> <br>

        <button type="submit">Enviar</button>
        <br>

    </form>
    <br>


@endsection
