@extends('layouts.layout')

@section('title', 'Editar contraseña')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cambiar contraseña') }}
                        <div class="float-right">
                                <a href="{{ route('profile', ['id'=>$user->id]) }}" class="btn btn-primary mr-2">Volver a perfil</a>
                        </div>
                    </div>

                    <form action="{{ route('update_password', ['id' => $user->id])}}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="card-body" style = "background-color: #D7CABF;">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('¡Contraseña actualizada correctamente!') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ __('¡Error! Las contraseñas no coinciden.') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">{{ __('Contraseña anterior') }}</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="{{ __('Contraseña anterior') }}">
                                @error('old_password')
                                    <span class="text-danger">
                                        @if($message === 'validation.required')
                                            {{ __('El campo :attribute es requerido.', ['attribute' => __('Contraseña anterior')]) }}
                                        @elseif($message === 'validation.min.string')
                                            {{ __('El campo :attribute debe tener al menos :min caracteres.', ['attribute' => __('Contraseña anterior'), 'min' => 8]) }}
                                        @else
                                            {{ $message }}
                                        @endif
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">{{ __('Nueva contraseña') }}</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="{{ __('Nueva contraseña') }}">
                                @error('new_password')
                                    <span class="text-danger">
                                        @switch($message)
                                            @case('validation.required')
                                                {{ __('El campo :attribute es requerido.', ['attribute' => __('Nueva contraseña')]) }}
                                                @break
                                            @case('validation.min.string')
                                                {{ __('El campo :attribute debe tener al menos :min caracteres.', ['attribute' => __('Nueva contraseña'), 'min' => 8]) }}
                                                @break
                                            @default
                                                {{ $message }}
                                        @endswitch
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">{{ __('Confirmar nueva contraseña') }}</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="{{ __('Confirmar nueva contraseña') }}">
                                @error('new_password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">{{ __('Guardar contrasña') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
