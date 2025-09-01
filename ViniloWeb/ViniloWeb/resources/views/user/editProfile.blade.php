@extends('layouts.layout')

@section('title', 'Editar contraseña')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar perfil') }}
                    <div class="float-right">
                        <a href="{{ route('profile', ['id'=>$user->id]) }}" class="btn btn-primary mr-2">Volver a perfil</a>
                    </div>
                    </div>

                    <form action="{{ route('update_profile', ['id' => $user->id])}}" method="POST">
                        @method('POST')
                        @csrf
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
                                <label for="nameInput" class="form-label">{{ __('Nombre de usuario') }}</label>
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput"
                                    placeholder="{{ __('Nombre de usuario') }}" value="{{ $user->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">{{ __('Email') }}</label>
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput"
                                    placeholder="{{ __('Email') }}" value="{{ $user->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">{{ __('Guardar cambios') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
