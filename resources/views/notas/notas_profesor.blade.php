@extends('layouts.plantilla')
@section('title', 'Notas Profesor')
@section('contenido')

<?php use App\Asignatura;
  use App\Notas;
  use App\Alumnos;
      $nombre = Asignatura::where('id_asignatura',$asignatura)->first();
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
      $parciales = DB::table('notas')
           ->select('id_notas','descripcion','created_at','id_curso','id_asignatura','id_profesor')
                   ->distinct()
           ->where('id_curso','=',$cursos)
           ->where('id_asignatura','=',$asignatura)
           ->where('semestre',$semestre)
           ->where('año',$año)
           ->get();
 ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script>
  $(document).ready( function () {
    $('#example1').DataTable();
} );
</script>

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

    <div class="col-lg-3 offset-md-1">
      <a type="button" class="btn btn-info btn-sm" href="/asistencia"><i class="fas fa-arrow-left"></i></a>
      <div class="card">
      <div class="card-header border-0">
        <h10 class="card-tittle">Descripcion de notas</h10>
        <div class="card-body table-responsive-0">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nota</th>
                <th>Descripcion</th>
                <th>Modificar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($parciales as $a)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$a->descripcion}}</td>
                <td><a type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#modal_editarnotas-{{$a->id_notas}}"><i class="fas fa-info-circle"></i></a></td>
              </tr>
              @include('notas.modal_notasprofesor')
              @include('notas.modal_editarnotas')
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
    @foreach($nombre_curso as $curso)
      <div class="col-lg-6 offset-md-1">
        <div class="card mb-2">
          <div class="card-header">
            <i class="fas fan-pen-square"></i>
            <div class="card-body">
              <div class="box box-primary">
                  <div class="box-body">
                    <div class="form-group">
                      <table id="example2" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                          <th scope="col">Nombre Alumno</th>
                          @for($i=1;$i<11;$i++)
                          <th scope="col">{{$i}}</th>
                          @endfor
                          <th scope="col">Promedio</th>
                          </tr>
                        </thead>
                        <?php $alumnos = DB::table('alumnos')
                                         ->where('id_curso',$cursos)
                                         ->get();
                              $nalumnos = DB::table('alumnos')
                                         ->where('id_curso',$cursos)
                                         ->count();
                              $promedio_curso=0;
                         ?>
                        @foreach($alumnos as $alumno)
                        <?php
                          $parciales = DB::table('notas')
                          ->select('nota')
                          ->where('id_curso','=',$cursos)
                          ->where('id_asignatura','=',$asignatura)
                          ->where('id_alumno','=',$alumno->id_alumnos)
                          ->where('semestre',$semestre)
                          ->where('año',$año)
                          ->get();

                           $faltantes = Notas::where('id_alumno','=',$alumno->id_alumnos)->where('año',$año)->where('semestre',$semestre)->where('id_asignatura',$asignatura)->count();
                           $promedio = Notas::where('id_alumno','=',$alumno->id_alumnos)->where('año',$año)->where('semestre',$semestre)->where('id_asignatura',$asignatura)->avg('nota');

                           $promedio_curso+=$promedio;

                         ?>
                          <tbody>
                            <tr>
                            <td>{{$alumno->nombre_alumnos}}</td>
                            @foreach($parciales as $a)
                            @if($a->nota>=4)
                            <td><span class="pull-right badge bg-blue btn-block">{{$a->nota}}</span></td>
                            @else
                            <td><span class="pull-right badge bg-red btn-block">{{$a->nota}}</span></td>
                            @endif
                            @endforeach
                            @for($i=$faltantes;$i<10;$i++)
                            <td></td>
                            @endfor
                            @if($promedio>=4)
                            <td><span class="pull-right badge bg-blue btn-block">{{number_format($promedio,'1','.',',')}}</span></td>
                            @else
                            <td><span class="pull-right badge bg-red btn-block">{{number_format($promedio,'1','.',',')}}</span></td>
                            @endif
                            </tr>
                          </tbody>
                        @endforeach
                        <tfoot>
                            @if($promedio_curso!=0)
                            <td colspan="11" style="text-align: right;">Promedio Curso</td>
                            @if($promedio>=4)
                            <td><span class="pull-right badge bg-blue btn-block">{{number_format($promedio_curso/$nalumnos,'2','.',',')}}</span></td>
                            @else
                            <td><span class="pull-right badge bg-red btn-block">{{number_format($promedio_curso/$nalumnos,'2','.',',')}}</span></td>
                            @endif
                            @endif
                        </tfoot>
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