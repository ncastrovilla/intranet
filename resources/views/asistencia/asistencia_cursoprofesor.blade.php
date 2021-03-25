@extends('layouts.plantilla')
@section('title', 'Notas Profesor')
@section('contenido')
<body>
    <div class="page-header">
      @foreach($nombre_curso as $curso)
      <h3 style="color:#2c6aa0">Asistencia {{$curso->grado.' '.$curso->letra}}</h3>
      @endforeach
    </div>
    <div class="offset-md-1">
    </div>
    <br>
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
                    <table class="table table-stripped" id="asistencia">
                      <thead>
                      <tr>
                        <th scope="col">Fecha Clase</th>
                        <th scope="col">Ver</th>
                        <th scope="col">Modificar</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $contador=1;
                      ?>
                      @foreach($asistencias as $a)
                      <?php ++$contador; ?>
                        <tr>
                          <td>{{date("d-m-Y", strtotime($a->fecha_asistencia))}}</td>
                          <td>
                            <a type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#modal_verasistencia-{{$a->id_asistencia}}"><i class="fas fa-eye" style="color: white;"></i></a>
                            @include('asistencia.modal_verasistencia')
                          </td>
                          <td><a type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#modal_modificarasistencia-{{$a->id_asistencia}}-{{$contador}}"><i class="fas fa-pen-square" style="color: white;"></i></a>
                        @include('asistencia.modal_modificarasistencia')
                          </td>
                        </tr>
                        <?php ++$contador; ?>
                        @endforeach
                        </tbody>
                    </table>
                    <a type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_subirasistencia-{{$id_curso}}-{{$asignatura}}-{{$profesor}}"><i class="fas fa-plus" style="color: white;"></i>@include('asistencia.modal_subirasistencia')</a>
                    
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
<script>
 $(document).ready( function () {
    $('#asistencia').DataTable();
} );
</script>

@endsection