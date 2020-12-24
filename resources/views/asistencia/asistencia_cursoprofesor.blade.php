@extends('layouts.index')
@section('title', 'Notas Profesor')
@section('contenido')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
<div class="row">
    <div class="col offset-md-1">
      @foreach($nombre_curso as $curso)
      <h3 style="color:#2c6aa0">Asistencia {{$curso->grado.' '.$curso->letra}}</h3>
      @endforeach
    </div>
    <div class="offset-md-1">
    </div>
</div>
<div id="content-wrapper">
  <div class="row">
    <div class="col offset-md-1">
      <div class="card mb-3">
        <div class="card-header">
      <a type="button" class="btn btn-info btn-sm" href="/asistencia"><i class="fas fa-arrow-left"></i></a>
          <i class="fas fan-pen-square"></i>
          <div class="card-body">
            <div class="box box-primary">
                <div class="box-body">
                  <div class="form-group">
                    <table class="table table-bordered">
                      <tr>
                        <th scope="col">Fecha Clase</th>
                        <th scope="col">Ver</th>
                        <th scope="col">Modificar</th>
                      </tr>
                      @foreach($asistencias as $a)
                        <tr>
                          <td>{{date("d-m-Y", strtotime($a->fecha_asistencia))}}</td>
                          <td>
                            <a type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#modal_verasistencia-{{$a->id_asistencia}}"><i class="fas fa-eye" style="color: white;"></i></a>
                          </td>
                          <td><a type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#modal_modificarasistencia-{{$a->id_asistencia}}"><i class="fas fa-pen-square" style="color: white;"></i></a></td>
                        </tr>
                        @include('asistencia.modal_verasistencia')
                        @include('asistencia.modal_modificarasistencia')
                        @endforeach
                    </table>
                    <a type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_subirasistencia-{{$id_curso}}-{{$asignatura}}-{{$profesor}}"><i class="fas fa-plus" style="color: white;"></i></a>
                    @include('asistencia.modal_subirasistencia')
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