@extends('layouts.plantilla')
@section('title', 'ver notas profesor')
@section('contenido')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Asistencia</h3>
    </div>
    <div class="offset-md-1">
    </div>
</div>
<div id="content-wrapper">
  <div class="row">
    <div class="col offset-md-1">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fan-pen-square"></i>
          <div class="card-body">
            <div class="table-responsive">
              <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="dataTable_length">
                      </br>
                    </div>
                  </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                      <thead>
                      <tr>
                        <th scope="col">Asignatura</th>
                        <th scope="col">Profesor</th>
                        <th scope="col">Nota</th>
                      </tr>
                      </thead>
                      @foreach($alumno as $a)
                      <tbody>
                        <tr role="row" class="odd"> 
                        <tr>
                          <td>{{$a->nombre_asignatura}}</td>
                          <td>{{$a->nombres_profesor}} {{$a->apellido_paterno}}</td>
                          <td><a type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#modal_verasistencia_alumnos-{{$a->id_alumnos}}-{{$a->id_asignatura}}"><i class="fas fa-info-circle"></i></a></td>
                        </tr>
                        </tr>
                      </tbody>
                        @include('asistencia.modal_verasistencia_alumnos')
                      @endforeach
                    </table>
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