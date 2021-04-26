@extends('layouts.plantilla')
@section('title', 'Notas Profesor')
@section('contenido')

<?php use App\Asignatura;
  use App\Notas;
  use App\Alumnos;
  use App\Ponderaciones;
      $nombre = Asignatura::where('id_asignatura',$asignatura)->first();
      $i=1;



  if(isset($año)){
 
  }else{
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

  }
      $parciales = DB::table('notas')
                  ->join('ponderaciones','notas.id_ponderacion','ponderaciones.id_ponderacion')
                  ->select('notas.id_notas','ponderaciones.id_ponderacion','ponderaciones.porcentaje','ponderaciones.descripcion_ponderacion','ponderaciones.cantidad','notas.descripcion','notas.id_curso','notas.id_asignatura','notas.id_profesor','ponderaciones.id_ponderacion')
                  ->distinct()
                  ->where('notas.id_curso','=',$cursos)
                  ->where('notas.id_asignatura','=',$asignatura)
                  ->where('ponderaciones.id_dicta',$dicta)
                  ->where('ponderaciones.semestre',$semestre)
                  ->where('notas.semestre',$semestre)
                  ->where('notas.año',$año)
                  ->get();

      
      $ponderaciones = DB::table('ponderaciones')->where('id_dicta',$dicta)->where('semestre',$semestre)->get();
      $porcentaje = DB::table('ponderaciones')->where('id_dicta',$dicta)->sum('porcentaje');
      $totalporcentaje =0;
      $listo =0;
      foreach ($ponderaciones as $p) {
        $totalporcentaje += $p->porcentaje;
      }
      $total = Ponderaciones::where('id_dicta',$dicta)->sum('cantidad');
      $notastotales = Notas::where('id_curso',$cursos)->where('año',$año)->where('semestre',$semestre)->where('id_asignatura',$asignatura)->distinct('descripcion')->count();
      if($total == $notastotales && $totalporcentaje==100){
        $listo = 1;
      }
 ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
    <div class="page-header">
      @foreach($nombre_curso as $curso)
      <h3 style="color:#2c6aa0">Notas {{$nombre->nombre_asignatura.' '.$curso->grado.' '.$curso->letra}}</h3>
      @endforeach
    </div>
    <div class="card mb-3">

    </div><br>

  <div class="row">

    <div class="col-lg-5 offset-md-0">
      <a type="button" class="btn btn-info btn-sm" href="/asistencia"><i class="fas fa-arrow-left"></i></a>
      <div class="card">
      <div class="card-header border-0">
        @if(!$parciales->isEmpty())
        <h10 class="card-tittle">Descripcion de notas</h10>
        <div class="card-body table-responsive-">
          <table  class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nota</th>
                <th>Descripcion</th>
                <th>Porcentaje</th>
                @if($año ==date('Y'))
                <th>Modificar</th>
                <th>Eliminar</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($parciales as $a)
              <?php 
                  $cantidad = DB::table('notas')
                            ->where('id_ponderacion',$a->id_ponderacion)
                            ->distinct('descripcion')
                            ->count();


              ?>
              
              <tr>
                <td>{{$i++}}</td>
                <td>{{$a->descripcion}}</td>
                <td>{{number_format($a->porcentaje/$a->cantidad,'1','.',',')}}%</td>
                @if($año ==date('Y'))
                <td><a type="button" class="btn btn-warning btn-sm btn-block " data-toggle="modal" data-target="#modal_editarnotas-{{$a->id_notas}}"><i class="fas fa-info-circle"></i></a></td>
                 <td><a type="button" class="btn btn-danger btn-sm btn-block " data-toggle="modal" data-target="#modal_eliminarnota-{{$a->id_notas}}"><i class="fas fa-trash"></i></a></td>
                @endif
              </tr>
              
              @include('notas.modal_notasprofesor')
              @include('notas.modal_editarnotas')
              @include('notas.modal_eliminarnota')
              @endforeach
            </tbody>
          </table><br>
        </div>
          
        <div class="card-body table-responsive-0">
          <label>Ponderaciones asignatura</label>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Cantidad</th>
                <th>Descripcion</th>
                <th>Ponderacion</th>
                @if($año ==date('Y'))
                <th>Modificar</th>
                @endif
              </tr>
            </thead>
              @foreach($ponderaciones as $a)
              <tr>
                <td>{{$a->cantidad}}</td>
                <td>{{$a->descripcion_ponderacion}}</td>
                <td>{{number_format($a->porcentaje,'1','.',',')}}%</td>
                 @if($año ==date('Y'))
                <td><a type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_editarponderaciones-{{$a->id_ponderacion}}"><i class="fas fa-pen"></i></a></td>
                @endif
                @include('notas.modal_editarponderacion')
              </tr>
              @endforeach
            </tbody>
             @if($año ==date('Y') && $porcentaje <100)
             <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_createponderaciones-{{$dicta}}"><i class="fas fa-plus-circle" style="color: white;"></i></a>
                      @include('notas.modal_createponderaciones')
              @endif
          </table>
        </div>
        @else
        <div class="card-body table-responsive-0">
          <label>Ponderaciones asignatura</label>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Cantidad</th>
                <th>Descripcion</th>
                <th>Ponderacion</th>
                @if($año ==date('Y'))
                <th>Modificar</th>
                @endif
              </tr>
            </thead>
              @foreach($ponderaciones as $a)
              <tr>
                <td>{{$a->cantidad}}</td>
                <td>{{$a->descripcion_ponderacion}}</td>
                <td>{{number_format($a->porcentaje,'1','.',',')}}%</td>
                <td></td>
              </tr>
              @endforeach
            </tbody>
             @if($año ==date('Y') && $porcentaje <100)
             <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_createponderaciones-{{$dicta}}"><i class="fas fa-plus-circle" style="color: white;"></i></a>
             @endif
                      @include('notas.modal_createponderaciones')
          </table>
        </div>
          @endif
      </div>
    </div>
  </div>
    @foreach($nombre_curso as $curso)
      <div class="col-lg-6 offset-md-0">
        <div class="card mb-2">
          <div class="card-header">
            <i class="fas fan-pen-square"></i>
            <div class="card-body">
              <div class="box box-primary">
                  <div class="box-body">
                    <div class="form-group">
                      <table  class="table table-bordered table-hover">
                          <thead>
                            <tr>
                          <th scope="col">Nombre Alumno</th>
                          @for($i=1;$i<11;$i++)
                          <th scope="col">{{$i}}</th>
                          @endfor
                          <th scope="col">Promedio parcial</th>
                          </tr>
                        </thead>
                        <?php $alumnos = DB::table('alumnos')
                                         ->join('pertenece','alumnos.id_alumnos','=','pertenece.id_alumno')
                                         ->select('alumnos.id_alumnos','alumnos.nombre_alumnos')
                                         ->where('pertenece.id_curso','=',$cursos)
                                         ->where('pertenece.año',$año)
                                         ->get();
                              $nalumnos = DB::table('alumnos')
                                         ->join('pertenece','alumnos.id_alumnos','=','pertenece.id_alumno')
                                         ->where('pertenece.id_curso','=',$cursos)
                                         ->where('pertenece.año',$año)
                                         ->count();
                              $promedio_curso=0;
                         ?>
                        @foreach($alumnos as $alumno)
                        <?php
                          $promedio2 = 0;
                          $parciales = DB::table('notas')
                          ->join('ponderaciones','notas.id_ponderacion','ponderaciones.id_ponderacion')
                          ->where('notas.id_curso','=',$cursos)
                          ->where('notas.id_asignatura','=',$asignatura)
                          ->where('notas.id_alumno','=',$alumno->id_alumnos)
                          ->where('notas.semestre',$semestre)
                          ->where('notas.año',$año)
                          ->get();

                           $faltantes = Notas::where('id_alumno','=',$alumno->id_alumnos)->where('año',$año)->where('semestre',$semestre)->where('id_asignatura',$asignatura)->count();
                           $llegaral100 =0;

                         ?>
                          <tbody>
                            <tr>
                            <td>{{$alumno->nombre_alumnos}}</td>
                            @foreach($parciales as $a)
                            @if($a->nota!='p')
                            <?php 
                              $porcentajeindividual = $a->porcentaje/$a->cantidad;
                              $nota = ($a->nota * $porcentajeindividual)/100;
                              $nota = number_format($nota,'1','.',',');
                              $promedio2 +=$nota;
                            ?>
                            @if($a->nota>=4)
                            <td><span class="pull-right badge bg-blue btn-block">{{$a->nota}}</span></td>
                            @else
                            <td><span class="pull-right badge bg-red btn-block">{{$a->nota}}</span></td>
                            @endif
                            @else
                            <td><span class="pull-right badge bg-yellow btn-block">P</td>
                            @endif
                            @endforeach
                            <?php
                              $promedio_curso+=$promedio2;
                             ?>
                            @for($i=$faltantes;$i<10;$i++)
                            <td></td>
                            @endfor
                            @if($promedio2!=0 && $listo==1)
                            @if($promedio2>=4)
                            <td><span class="pull-right badge bg-blue btn-block">{{$promedio2}}</span></td>
                            @else
                            <td><span class="pull-right badge bg-red btn-block">{{$promedio2}}</span></td>
                            @endif
                            @else
                            <td><span class="pull-right badge bg-red btn-block"></span></td>
                            <?php $promedio_curso+=1; ?>
                            @endif
                            </tr>
                          </tbody>
                        @endforeach
                        <tfoot>
                            @if($promedio_curso!=0 && $listo==1)
                            <td colspan="11" style="text-align: right;">Promedio Curso</td>
                            @if($promedio_curso/$nalumnos>=4)
                            <td><span class="pull-right badge bg-blue btn-block">{{number_format($promedio_curso/$nalumnos,'1','.',',')}}</span></td>
                            @else
                            <td><span class="pull-right badge bg-red btn-block">{{number_format($promedio_curso/$nalumnos,'1','.',',')}}</span></td>
                            @endif
                            @endif
                        </tfoot>
                      </table>
                      @if($año ==date('Y') && !$ponderaciones->isEmpty() && $listo != 1)
                      <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_subirnotas-{{$cursos}}-{{$asignatura}}-{{$dicta}}"><i class="fas fa-plus-circle" style="color: white;"></i></a>
                      @include('notas.modal_subirnotas')
                      @endif
                    </div>
                    <div class="form-group">
                      <form action="/certificado/notas/curso" method="post" target="_blank">
                        @csrf
                        <input type="text" name="id_curso" value="{{$cursos}}" hidden>
                        <input type="text" name="año" value="{{$año}}" hidden=>
                        <input type="text" name="semestre" value="{{$semestre}}" hidden=>
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
    @endforeach
  </div>
<script>
  $(function () {
    $("#example2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</body>
</br>
@endsection