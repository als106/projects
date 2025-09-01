@extends('layouts.layout')

@section('title', 'Listar Géneros')

@section('content')
    <h1>Listado de Géneros</h1>
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
            <form class="col-auto" action="{{ route('genres_index_sorted') }}" method="GET">
                @csrf
                <button class="btn btn-primary" type="submit">Ordenar</button>
            </form>
            <div class="col-auto">
                <a class="btn btn-success" href="{{ route('genre_create') }}">Añadir nuevo género</a>
            </div>
        </div>
        
        <div class="row">
            @foreach ($genres as $g)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $g->name }}</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <form action="{{ route('delete_genre', ['id'=>$g->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                                <a class="btn btn-primary" href="{{route('genre_update_get', ['id'=>$g->id])}}">Editar</a>  
                            </div>                 
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
         
        <div class="row justify-content-center mt-3">
            @if(isset($name))
                {{ $genres->appends(['sort' => $name])->links() }}
            @else
                {{ $genres->links() }}
            @endif
        </div>
    </div>    
@endsection
