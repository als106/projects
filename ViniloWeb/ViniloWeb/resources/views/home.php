@extends('layouts.layout')
@section('content')
<div class="panel panel-success">
            <div class="panel-heading">buscar Noticiero</div>
            <form action="noticia/buscar" method="get" onsubmit="return showLoad()">
            <div class="panel-body">
                <label class="label-control">Nombre del noticiero</label>
                <input type="text" name="noticiero_turno" class="form-control" placeholder="Ingresar nombre del noticiero/descripcion" required="required">
                <br>

        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-success">buscar</button>
        </div>
        </form>
    </div>

    <!-- check if $buscar variable is set, display buscar result -->
    @if (isset($buscar))
        <div class="panel panel-success">
            <div class="panel-heading">Resultado de la busqueda</div>
            <div class="panel-body">

                <div class='table-responsive'>
                  <table class='table table-bordered table-hover'>
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>PROGRAMA</th>
                        <th>TURNO</th>
                        <th>FECHA</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($buscar as $buscars)
                        <tr>
                            <td>{{$buscars->id}}</td>
                            <td>{{$buscars['noticiero_programa']}}</td>
                            <td>{{$buscars['noticiero_turno']}}</td>
                            <td>{{$buscars['noticiero_fecha']}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                        </table>
                        <center>{{ $buscar->appends(Request::only('noticiero_turno','noticiero_programa'))->links() }}</center>
                    </div>

            </div>
            <div class="panel-footer">
                <a href="{{url('noticia/buscar')}}" class="btn btn-warning">Restaurar busqueda</a>
            </div>
        </div>
    @endif

    @stop

@endsection
