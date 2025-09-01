@extends('layouts.layout')

@section('title', 'Listado de Autores')

@section('content')
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <h1>Listado de Autores</h1>
    @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
    <div class="container">
        <div class="row mb-3">
            <a href="{{ url('/admin') }}"  style="padding: 0;">
                <img src="/img/flecha.png" alt="Flecha"  width="40" height="40">
            </a> 
            <form action="{{ route('sort_authors') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary mr-2">Ordenar por nombre</button>
            </form> <br>

            <a href="{{ url('authors/create') }}" class="btn btn-success mr-2">Añadir autores</a>
        </div>
        <ul class="list-group">
            @foreach($authors as $a)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">
                        <a href="{{ route('mostrar_author', ['id'=>$a->id]) }}">
                            {{ $a->name }}
                        </a>
                    </h2>
                    <div>
                        <a href="{{route('edit_author', ['id'=>$a->id])}}" class="btn btn-warning mr-2">Editar</a>
                        <form action="{{route('destroy_author', ['id'=>$a->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="mt-3">
            @if(isset($name))
                {{ $authors->appends(['sort' => $name])->links() }}
            @else
                {{ $authors->links() }}
            @endif
        </div>
    </div>
@endsection
