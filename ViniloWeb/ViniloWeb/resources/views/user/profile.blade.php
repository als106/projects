@extends('layouts.layout')

@section('title', 'Perfil usuario')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Perfil') }}</div>

                    <div class="card-body" style = "background-color: #D7CABF;">
                    @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('¡Usuario actualizado correctamente!') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ __('¡Error! No se puedo actualizar el usuario') }}
                                </div>
                            @endif
                        <div class="mb-3">
                            <label for="nameInput" class="form-label">{{ __('Nombre') }}</label>
                            <input name="name" type="text" class="form-control" id="nameInput" value="{{ $user->name }}" disabled>
                        </div>
                        <div class="mb-3"  display: inline-block;min-width: 100px>
                            <label for="emailInput" class="form-label">{{ __('Correo electrónico') }}</label>
                            <input name="email" type="email" class="form-control" id="emailInput" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="roleInput" class="form-label">{{ __('Rol') }}</label>
                            <input name="role" type="text" class="form-control" id="roleInput" value="{{ $user->role }}" disabled>
                        </div>

                        <a href="{{ route('change_password', ['id'=>$user->id])}}" class="btn btn-success mr-2">Cambiar contraseña</a>
                        <a href="{{ route('change_profile', ['id'=>$user->id])}}" class="btn btn-success mr-2">Editar usuario</a>
                        <form action="{{ route('destroy_user', ['id'=>$user->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onmouseover="" style="cursor: pointer;">Eliminar</button>
                        </form>

                </div>
            </div>
        </div>
    </div>
@endsection