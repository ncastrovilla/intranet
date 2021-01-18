@extends('layouts.plantilla')
@section('title', 'ver notas profesor')
@section('contenido')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php 
  use App\Profesor;

  $profesor = Profesor::where('id_profesor',$curso->id_profesor)->first();
  $array = array('red','green','blue','yellow','cyan');
  $i=0;
  $contador=0;
?>

<body>
<div class="row">
    <div class="page header col offset-md-1">
      <h3 style="color:#2c6aa0">Calificacion Asignaturas</h3>
    </div>
    <div class="offset-md-1">
    </div>
</div>
<div class="content-wrapper">
  <br>
  <div class="col-md-12 mr-auto">
  <div class="bs-callout  bs-callout-info">
    <div class="row">
        <div class="col-xs-12 col-lg-6">
            <div class="form-group">
                <label class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:Times new roman">Curso</label>
                <label class="col-sm-3 col-xs-12" style="color:#393939;font-family:calibri">{{$curso->grado.' '.$curso->letra}}</label>
            </div>
        </div>
        <div class="col-xs-12 col-lg-6">
            <div class="form-group">
                <label class="col-sm-4 col-xs-12" style="color:#2c6aa0;font-family:Times new roman">Numero de asignaturas</label>
                <label class="col-sm-3 col-xs-12" style="color:#393939;font-family:calibri">{{$asignaturas}}</label>
            </div>
        </div>
        <div class="col-xs-12 col-lg-6">
            <div class="form-group">
                <label class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:Times new roman">Profesor Jefe</label>
                <label class="col-sm-5 col-xs-12" style="color:#393939;font-family:calibri">{{$profesor->nombres_profesor.' '.$profesor->apellido_paterno.' '.$profesor->apellido_materno}}</label>
            </div>
        </div>
        <div class="col-xs-12 col-lg-6">
            <div class="form-group">
                <label class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:Times new roman">Correo profesor jefe</label>
                <label class="col-sm-8 col-xs-12" style="color:#393939;font-family:calibri">{{$profesor->correo}}</label>
            </div>
        </div>                                              
    </div>
  </div>
    <div class="col-md-5" style="left: 400px;"> 
    <div class="bs-callout bs-callout-success"> 
      <div class="row">
        @foreach($alumno as $a)
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-{{$array[$i++]}}">
            <div class="inner">
              <p>{{$a->nombre_asignatura}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a type="button" class="small-box-footer" data-toggle="modal" data-target="#modal_notas-{{$a->id_alumnos}}-{{$a->id_asignatura}}">Notas <i class="fas fa-arrow-circle-right"></i></a>
            <a type="button" class="small-box-footer" data-toggle="modal" data-target="#modal_verasistencia_alumnos-{{$a->id_alumnos}}-{{$a->id_asignatura}}">Asistencia <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php ++$contador ?>
        @include('notas.modal_notas')
        @include('asistencia.modal_verasistencia_alumnos')
        @endforeach
      </div>
    </div>
    </div>
  </div>
</div>

</table>
</body>
@endsection