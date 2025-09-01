@extends('layouts.layout')

@section('title', 'Editar Usuario')

@section('content')
<div class="row justify-content-center">
    <h1>Edicion de usuario</h1>
</div>

<div class="container my-4">
    <div class="card">
        <div class="card-body">
            <label>
                <strong>Editando usuario</strong>
            </label>
            <div class="float-right">
                <form action="{{ route('users_index') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary mr-2">Volver a usuarios</button>
                </form>
            </div>
            <div class="container">
                <form action="{{ route('users_update', ['id' => $user->id])}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nombre</td>
                                <td>
                                    <input type="text" name="name" size="30" value="{{ $user->name }}"/>
                                    @error('name')
                                    <br>
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input type="text" name="email" size="50"value="{{ $user->email }}"/>
                                    @error('email')
                                    <br>
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <form action="{{ route('users_update', ['id' => $user->id])}}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-block" style="background-color:purple">Editar usuario</button>
                                    </form>
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