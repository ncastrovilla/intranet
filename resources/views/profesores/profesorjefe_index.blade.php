@extends('layouts.plantilla')
@section('title', 'calendario profesor')
@section('contenido')
<?php 
	use App\Asignatura;
	use App\Notas;
  use App\Alumnos;
  use App\Curso;
      $i=1;

      if(date('m')<3){
      $año = date('Y')-1;
      $semestre = 2;
    }else{
      if(date('m')<=8){
        $año = date('Y');
        $semestre = 1;
      }else{    
        $año = date('Y');
        $semestre = 2;
      }
    }

  $curso = Curso::where('id_curso',$id_curso)->first();
 ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Mi curso</h3>
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
            <div class="box box-primary">
                <div class="box-body">
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
                                <label class="col-sm-3 col-xs-12" style="color:#393939;font-family:calibri">{{count($asignaturas)}}</label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:Times new roman">Numero alumnos</label>
                                <label class="col-sm-8 col-xs-12" style="color:#393939;font-family:calibri">{{count($alumnos)}}</label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:Times new roman">Semestre</label>
                                <label class="col-sm-8 col-xs-12" style="color:#393939;font-family:calibri">{{$semestre}}</label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:Times new roman">Año</label>
                                <label class="col-sm-8 col-xs-12" style="color:#393939;font-family:calibri">{{$año}}</label>
                            </div>
                        </div>                                              
                    </div>
                  </div>
                  <div class="form-group">
                    <table class="table table-bordered">
                      <tr>
                        <th scope="col">Asignatura</th>
                        <th scope="col">Notas</th>
                        <th scope="col">Promedios Rojo</th>
                        <th scope="col">Ver notas</th>
                        <th scope="col">Asistencia</th>
                      </tr>
                      @foreach($asignaturas as $asignatura)
                        <tr>
                        <?php
                        $rojos = 0;
                        	$nombre = Asignatura::where('id_asignatura',$asignatura->id_asignatura)->first();
                        	foreach ($alumnos as $alumno) {
                        			$parciales = DB::table('notas')
						                          ->select('nota')
						                          ->where('id_curso','=',$asignatura->id_curso)
						                          ->where('id_asignatura','=',$asignatura->id_asignatura)
						                          ->where('id_alumno','=',$alumno->id_alumnos)
						                          ->where('semestre',$semestre)
						                          ->where('año',$año)
						                          ->avg('nota');
						            $nnotas = DB::table('notas')
						                          ->select('nota')
						                          ->where('id_curso','=',$asignatura->id_curso)
						                          ->where('id_asignatura','=',$asignatura->id_asignatura)
						                          ->where('id_alumno','=',$alumno->id_alumnos)
						                          ->where('semestre',$semestre)
						                          ->where('año',$año)
						                          ->count();

						    if ($parciales<4 & $parciales!=0) {
                        		++$rojos;
                        	}

                        	}
                        	
                          ?>
                          <td>{{$nombre->nombre_asignatura}}</td>
                          <td>{{$nnotas}}</td>
                          <td>{{$rojos}}</td>
                          <td> <a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_notaspjefe-{{$asignatura->id_curso}}-{{$asignatura->id_asignatura}}">Notas <i class="fas fa-arrow-circle-right"></i></a>
                          	@include('profesores.modal_notaspjefe')
                          </td>
                          <td><a type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_asistenciapjefe-{{$asignatura->id_curso}}-{{$asignatura->id_asignatura}}"><i class="fas fa-calendar"></i></a>
                            @include('asistencia.modal_asistenciapjefe')
                          </td>
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