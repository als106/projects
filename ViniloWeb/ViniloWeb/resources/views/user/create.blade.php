@extends('layouts.layout')

@section('title', 'Crear usuario')

@section('content')

<div class="row justify-content-center">
    <h1>Añadir un usuario al sistema</h1>
</div>

<div class="container my-4">
    <div class="card">
        <div class="card-body">
            
            <label>
                <strong>Añadiendo usuario</strong>
            </label>
            <div class="float-right">
                <form action="{{ route('users_index') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary mr-2">Volver a usuarios</button>
                </form>
            </div>
            <div class="container">
                <form action="{{ route('users_store')}}" method="POST">
                    @method('POST')
                    @csrf
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nombre</td>
                                <td>
                                    <input type="text" name="name" size="30" value=""/>
                                    @error('name')
                                    <br>
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input type="text" name="email" size="50"value=""/>
                                    @error('email')
                                    <br>
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Contraseña</td>
                                <td>
                                    <input type="password" name="password" size="50"value=""/>
                                    @error('password')
                                    <br>
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Confirmar contraseña</td>
                                <td>
                                    <input type="password" name="password_confirmation" size="50"value=""/>
                                    @error('password_confirmation')
                                    <br>
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <form action="{{ route('users_store')}}" method="POST">
                                        @method('POST')
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-block" style="background-color:purple">Añadir usuario</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection