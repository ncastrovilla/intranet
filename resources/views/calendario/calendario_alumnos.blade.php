@extends('layouts.plantilla')
@section('title', 'calendario profesor')
@section('contenido')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Calendario</h3>
    </div>
    <div class="offset-md-1">
    </div>
</div>
<div id="content-wrapper">
  <div class="row">
    <div class="col offset-sm-auto">
      <div class="card mb-3">
        <div class="card-header">
          <div class="card-body">
            <div class="box box-primary">
                <div class="box-body">
                  <div class="form-group">
                    <table class="table table-bordered">
                      <tr>
                        <th scope="col">Asignatura</th>
                        <th scope="col">Profesor</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tema</th>
                      </tr>
                      @foreach($fechas as $fecha)
                        <tr>
                          <td>{{$fecha->nombre_asignatura}}</td>
                          <td>{{$fecha->nombres_profesor.' '.$fecha->apellido_paterno}}</td>
                          <td>{{date("d-m-Y", strtotime($fecha->fecha_evaluacion))}}</td>
                          <td>{{$fecha->descripcion_evaluacion}}</td>
                        </tr>
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