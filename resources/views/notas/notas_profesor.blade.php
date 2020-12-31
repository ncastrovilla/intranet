@extends('layouts.index')
@section('title', 'Notas Profesor')
@section('contenido')

<?php use App\Asignatura;
      $nombre = Asignatura::where('id_asignatura',$asignatura)->first();
 ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
<div class="row">
    <div class="col offset-md-1">
      @foreach($nombre_curso as $curso)
      <h3 style="color:#2c6aa0">Notas {{$nombre->nombre_asignatura.' '.$curso->grado.' '.$curso->letra}}</h3>
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
      <a type="button" class="btn btn-info btn-sm" href="/notas/ver"><i class="fas fa-arrow-left"></i></a>
          <i class="fas fan-pen-square"></i>
          <div class="card-body">
            <div class="box box-primary">
                <div class="box-body">
                  <div class="form-group">
                    <table class="table table-bordered">
                      <tr>
                        <th scope="col">Descripcion de la nota</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Ver</th>
                        <th scope="col">Modificar</th>
                      </tr>
                      @foreach($parciales as $a)
                        <tr>
                          <td>{{$a->descripcion}}</td>
                          <td>{{date("d-m-Y", strtotime($a->created_at))}}</td>
                          <td><a type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#modal_notasprofesor-{{$a->id_notas}}"><i class="fas fa-info-circle"></i></a></td></td>
                          <td><a type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#modal_editarnotas-{{$a->id_notas}}"><i class="fas fa-info-circle"></i></a></td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        @include('notas.modal_notasprofesor')
                        @include('notas.modal_editarnotas')
                      @endforeach
                    </table>
                    <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_subirnotas-{{$cursos}}-{{$asignatura}}"><i class="fas fa-plus-circle" style="color: white;"></i></a>
                    @include('notas.modal_subirnotas')
                  </div>
                  <div class="form-group">
                    <form action="/certificado/notas/curso" method="post" target="_blank">
                      @csrf
                      <input type="text" name="id_curso" value="{{$cursos}}" hidden>
                      <input type="text" name="id_asignatura" value="{{$asignatura}}" hidden>
                      <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-file" style="color: white;"></i></button>
                    </form>
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