@extends('layouts.layout')

@section('title', 'User Orders')


@section('content')

<div class="container justify-content-center">
    <h1>Pedidos de usuario</h1>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha de pedido</th>
                    <th scope="col">Fecha de actualizacion</th>
                </tr>
                <div class="float-right">
                    <form action="{{ route('users_index') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-primary mr-2">Volver a usuarios</button>
                    </form>
                </div>
            </thead>
            <tbody>
                <tr>
                    <td>{{$orders->id}}</td>
                    <td>{{$orders->status}}</td>
                    <td>{{$orders->created_at}}</td>
                    <td>{{$orders->updated_at}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection