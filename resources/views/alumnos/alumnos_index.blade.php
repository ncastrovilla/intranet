@extends('layouts.index')
@section('title', 'Profesores')
@section('contenido')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Alumnos</h3>
    </div>
    <div class="offset-md-1">
    </div>
</div>
<div id="content-wrapper">
	<div class="row">
		<div class="col offset-md-0">
			<div class="card mb-2">
				<div class="card-header">
					<i class="fas fan-pen-square"></i>
					<div class="card-body">
						<div class="box box-primary">
							<form role="form">
								<div class="box-body">
									<table class="table table-bordered">
										<thead>
								        	<tr>
								          		<th scope="col">Nombre</th>
								          		<th scope="col">Rut</th>
								          		<th scope="col">Direccion</th>
								          		<th scope="col">Correo</th>
								          		<th scope="col">Curso</th>
								          		<th scope="col">Modificar</th>
								          		<th scope="col">Eliminar</th>
								        	</tr>
								        </thead>
								      	@foreach($alumno as $p)
								      	<tbody>
								      		<tr>
								      			<td>{{$p->nombre_alumnos}}</td>
								      			<td>{{$p->rut}}</td>
								      			<td>{{$p->direccion}}</td>
								      			<td>{{$p->correo_alumnos}}</td>
								      			<td>{{$p->id_curso}}</td>
								      			<td><a type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_updatealumnos-{{$p->id_alumnos}}"><i class="fas fa-pen-square" style="color: white;"></i></a>
								      			</td>
								      			<td><a type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modal_deletealumnos-{{$p->id_alumnos}}"><i class="fas fa-trash" ></i></a>
								      			</td>
								      		</tr>
								      	</tbody>
								      	@include('alumnos.modal_updatealumnos')
								      	@include('alumnos.modal_deletealumnos')
								      	@endforeach
								    </table>
								    <a type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_createalumnos"><i class="fas fa-save" style="color: white;"></i></a>
								    @include('alumnos.modal_createalumnos')
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>



@endsection