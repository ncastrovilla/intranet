@extends('layouts.index')
@section('title', 'ver evaluaciones profesor')
@section('contenido')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Evaluaciones Futuras</h3>
    </div>
    <div class="offset-md-1">
    </div>
</div>
<div id="content-wrapper">
  <div class="row">
    <div class="col offset-md-1">
      <div class="card mb-3">
        <div class="card-header"> 
          <a href="/calendario" type="button" class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i></a>
          <div class="card-body">
            <div class="box box-primary">
                <div class="box-body">
                  <div class="form-group">
                    <table class="table table-bordered">
                      <tr>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                      </tr>
                      @foreach($evaluaciones as $evaluacion)
                        <tr>
                          <td>{{$evaluacion->descripcion_evaluacion}}</td>
                          <td>{{$evaluacion->fecha_evaluacion}}</td>
                          <td>
                            <a type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#modal_modificarcalendario-{{$evaluacion->id_curso}}-{{$evaluacion->id_asignatura}}-{{$evaluacion->id_profesor}}-{{$evaluacion->id_calendario}}"><i class="fas fa-pen-square" style="color: white;"></i></a>
                          </td>
                          <td>
                            <a type="button" class="btn btn-warning btn-sm btn-block " data-toggle="modal" data-target="#modal_deleteevaluacion-{{$evaluacion->id_calendario}}"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        @include('calendario.modal_crearevaluacion')
                        @include('calendario.modal_modificarcalendario')
                        @include('calendario.modal_deleteevaluacion')
                      @endforeach
                    </table>
                    <a type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#modal_crearevaluacion-{{$curso}}-{{$asignatura}}-{{$profesor}}"><i class="fas fa-plus-circle" style="color: white;"></i></a>
                    @include('calendario.modal_crearevaluacion')
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</br>
@endsection