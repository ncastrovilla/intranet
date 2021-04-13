@extends('layouts.plantilla')
@section('title', 'Notas Profesor')
@section('contenido')
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
                    <table class="table table-bordered" id="example1">
                      <thead>
                      <tr>
                        <th scope="col">Fecha Clase</th>
                        <th scope="col">Ver</th>
                        @if( $año == date('Y'))
                        <th scope="col">Modificar</th>
                        @endif
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
                          @if($año == date('Y'))
                          <td><a type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#modal_modificarasistencia-{{$a->id_asistencia}}-{{$contador}}"><i class="fas fa-pen-square" style="color: white;"></i></a>
                        @include('asistencia.modal_modificarasistencia')
                        @endif
                          </td>
                        </tr>
                        <?php ++$contador; ?>
                        @endforeach
                        </tbody>
                    </table>
                    @if($año == date('Y'))
                    <a type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_subirasistencia-{{$id_curso}}-{{$asignatura}}-{{$profesor}}"><i class="fas fa-plus" style="color: white;"></i></a>
                    @include('asistencia.modal_subirasistencia')
                    @endif
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</br>
<script>
  $(function () {
    $("#profesor").DataTable({
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

@endsection