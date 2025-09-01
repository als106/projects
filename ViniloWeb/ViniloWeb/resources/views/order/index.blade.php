@extends('layouts.layout')

@section('title', 'Listar Pedidos')

@section('content')
    <div class="row justify-content-center">
        <h1>Listado de Pedidos</h1>
    </div>

    <div class="container justify-content-center">
        <a href="{{ url('/admin') }}"  style="padding: 0;">
            <img src="/img/flecha.png" alt="Flecha"  width="40" height="40">
        </a> 
        <a href="{{ route('order_create') }}" class="btn btn-success">Añadir Pedido</a>
        <a href="{{ route('orders_index_sorted', ['orderBy' => 'created_at']) }}" class="btn btn-primary mr-2">Ordenar por fecha de creación</a>
        <a href="{{ route('orders_index_sorted', ['orderBy' => 'status']) }}" class="btn btn-primary mr-2">Ordenar por estado</a>
        <div class="mb-3 d-flex flex-row">
            <form action="{{ route('order_search') }}" method="GET" class="mr-2">
                <div class="form-group">
                    <label for="query">Buscar pedido por productos o estado:</label>
                    <input type="text" class="form-control" name="query" id="query">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>            
        </div>
        @if(count($orders) > 0)
            @foreach ($orders as $o)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Estado</th>
                            <th scope="col">Productos</th>
                            <th scope="col">Precio Total</th>
                            <th scope="col">Fecha </th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $o->status }}</td>
                            <td>
                                <ul>
                                    @foreach ($o->products as $p)
                                        <li>{{ $p->name }} ({{ $p->price }} €)</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ $o->products->sum('price') }}€</td>
                            <td>{{ $o->created_at }}</td>
                            <td>
                                <div class="d-flex flex-row justify-content-center">
                                    <a href="{{ route('order_show', ['id'=>$o->id]) }}" class="btn btn-primary mr-2">Ver</a>
                                    <a href="{{ route('order_update', ['id'=>$o->id]) }}" class="btn btn-success mr-2">Editar</a>
                                    <form action="{{ route('delete_order', ['id'=>$o->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onmouseover="" style="cursor: pointer;">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <div class="row pd-3 pt-3">
                    &nbsp;
                    &nbsp;
                </div>
            @endforeach
            {{ $orders->links() }}
        @else
            <p>No se encontraron resultados para la búsqueda realizada.</p>
        @endif
    </div>
@endsection

