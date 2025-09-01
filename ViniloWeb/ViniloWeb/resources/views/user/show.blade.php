@extends('layouts.layout')

@section('title', 'Usuario en detalle')

@section('content')
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ __('¡Error! No tienes compras realizadas.') }}
    </div>
@endif

<div class="row justify-content-center">
    <h1>Información de {{ $user->name }}</h1>
</div>
<div class="row justify-content-center">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Creado</th>
                    <th scope="col">Actualizado</th>
                    <th>
                        <div class="float-right">
                            <form action="{{ route('users_index') }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary mr-2">Volver a usuarios</button>
                            </form>
                        </div>
                    </th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                </tr>
                <tr>
                    <td colspan="3">        
                        <div class="container">
                            <form action="{{ route('users_edit', ['id'=>$user->id]) }}" method="PUT">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="btn btn-primary btn-block" style="background-color:green">Editar</button>
                        </form>
                        </div>
                    </td>
                    <td colspan="3">
                        <div class="container">
                            <form action="{{ route('destroy_user', ['id'=>$user->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-block" onmouseover="" style="cursor: pointer;">Eliminar</button>
                            </form>
                        </div>
                </tr>
                <tr>
                    <td colspan="6">
                        <div class="container">
                            <form action="{{ route('users_order', ['id'=>$user->id]) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-block" style="background-color:purple">Ver pedidos</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection