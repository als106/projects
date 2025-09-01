@extends('layouts.layout')

@section('title', 'Listado de usuarios')
@section('content')
@if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif
<div class="row justify-content-center">
    <h1>Listado de usuarios</h1>
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
    <br>
<div class="container justify-content-center">


    <div class="row">
        <a href="{{ url('/admin') }}"  style="padding: 0;">
            <img src="/img/flecha.png" alt="Flecha"  width="40" height="40">
        </a>  
        <form action="{{ route('sort_users') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary mr-2">Ordenar por nombre</button>
        </form>
         <br>
         <a href="{{ url('users/create') }}" class="btn btn-success mr-2">Añadir usuarios</a>
    </div>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Fecha creacion</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
                <tr>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->created_at}}</td>
                    <td>
                        <div class="d-flex flex-row justify-content-center">
                            <a href="{{ route('users_show', ['id'=>$u->id]) }}" class="btn btn-primary mr-2">Ver</a>
                            <a href="{{ route('users_edit', ['id'=>$u->id]) }}" class="btn btn-success mr-2">Editar</a>
                            <form action="{{ route('destroy_user', ['id'=>$u->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onmouseover="" style="cursor: pointer;">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
    </ul>
    <div class="mt-3">
        @if(isset($name))
            {{ $users->appends(['sort' => $name])->links() }}
        @else
            {{ $users->links() }}
        @endif
    </div>

</div>




@endsection
