@extends('layouts.layout')

@section('title', 'Inicio')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<style>
    .card-summary {
        width: 18rem;
        background-color: #f9f9f9; 
        border-radius: 15px; 
        margin: 10px; 
    }
    .card-summary-body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 120px;
    }   
    .btn-admin {
        margin: 15px;
        width: 90%;
        background-color: #f0f0f0;
        margin-left: 50px;
        border-radius: 15px; 
        color: #B43C3C;
    }
    .card-number {
        font-size: 28px;
        font-weight: bold;
    }

    .card-label {
        font-size: 20px;
        color: #777;
    }

    .align-items-start{
        width: 50%;
        height: 52px;
        margin-bottom: 20px;
    }

    .note-textarea {
        height: 150px; /* ajusta esto a lo que quieras */
    }


</style>

<div class="container-fluid">
    <h2 class="text-center mt-2">Dashboard</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="d-grid gap-2">
                <a href="{{ route('users_index') }}" class="btn btn-admin btn-lg" >Usuarios</a>
                <a href="{{ route('products_index') }}" class="btn btn-admin btn-lg">Productos</a>
                <a href="{{ route('orders_index') }}" class="btn btn-admin btn-lg"> Pedidos</a>
                <a href="{{ route('authors_index') }}" class="btn btn-admin btn-lg"> Artistas</a>
                <a href="{{ route('genres_index') }}" class="btn btn-admin btn-lg"> Generos</a>
                <a href="{{ route('sales_index') }}" class="btn btn-admin btn-lg">Ofertas</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-wrap justify-content-around">
                <div class="card card-summary">
                    <div class="card-body card-summary-body">
                        <div class="card-number">{{ $numUsuarios }}</div>
                        <div class="card-label">Número de Usuarios</div>
                    </div>
                </div>
                <div class="card card-summary">
                    <div class="card-body card-summary-body">
                        <div class="card-number">{{ $numPedidos }}</div>
                        <div class="card-label">Número de Pedidos</div>
                    </div>
                </div>
                <div class="card card-summary">
                    <div class="card-body card-summary-body">
                        <div class="card-number">{{ $numProductos }}</div>
                        <div class="card-label">Número de Productos</div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="d-flex align-items-center mt-5" style="margin: 10px">
                    <h3 class="mr-3">Bloc de Notas</h3>
                </div>

                @foreach ($notes as $note)
                    <form action="{{ route('note_update', ['id' => $note->id]) }}" method="POST" class="d-flex align-items-start">
                        @csrf
                        <textarea class="form-control mr-2 note-textarea" name="note" rows="10">{{ $note->text }}</textarea>
                        <button type="submit" class="btn btn-primary" style="background-color: white; color: #B43C3C; border-color: #B43C3C">Guardar Nota</button>
                    </form>
                @endforeach
            </div>


        </div>
    </div>
</div>
@endsection
