@extends('layouts.plantilla')
@section('title', 'Profesores')
@section('contenido')
<?php 
	use App\Curso;
	use App\Pertenece;
 ?> 

<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Alumnos</h3>
    </div>
    <div class="offset-md-1">
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<div id="content-wrapper">
	<div class="row">
		<div class="col offset-md-0">
			<div class="card mb-2">
				<div class="card-header">
					<i class="fas fa-pen-square"></i>
					<div class="card-body">
						<div class="box box-primary">
								<div class="box-body">
									@if ($errors->any())
    								<div class="alert alert-danger">
        								<ul>
            								@foreach ($errors->all() as $error)
                							<li>{{ $error }}</li>
            								@endforeach
       									 </ul>
    								</div>
									@endif
									<table id="profesor" class="table table-bordered">
										<thead>
								        	<tr>
								          		<th scope="col">Nombre</th>
								          		<th scope="col">Rut</th>
								          		<th scope="col">Direccion</th>
								          		<th scope="col">Correo</th>
								          		<th scope="col">Modificar</th>
								          		<th scope="col">Cambiar curso</th>
								        	</tr>
								        </thead>
								      	<tbody>
								      	@foreach($alumno as $p)
								      		<tr>
								      			<td>{{$p->apellido_paterno.' '.$p->apellido_materno.' '.$p->nombre_alumnos}}</td>
								      			<td>{{$p->rut}}</td>
								      			<td>{{$p->direccion}}</td>
								      			<td>{{$p->correo_alumnos}}</td>
								      			<td><a type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#modal_updatealumnos-{{$p->id_alumnos}}"><i class="fas fa-pen-square" style="color: white;"></i></a>
								      			</td>
								      			<td><a type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#modal_cambiarcurso-{{$p->id_alumnos}}"><i class="fas fa-trash" ></i></a>
								      			</td>
								      		</tr>
								      	@include('alumnos.modal_updatealumnos')
								      	@include('alumnos.modal_cambiarcurso')
								      	@endforeach
								      	</tbody>
								    </table>
								    <a type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal_createalumnos"><i class="fas fa-plus" style="color: white;"></i></a>
								    @include('alumnos.modal_createalumnos')
								</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
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