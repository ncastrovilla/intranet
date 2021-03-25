@extends('layouts.plantilla')
@section('title', 'Profesores')
@section('contenido')
<?php 
	use App\Curso;
 ?> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Administrativos</h3>
    </div>
    <div class="offset-md-1">
    </div>
</div>
<div id="content-wrapper">
	<div class="row">
		<div class="col offset-md-0">
			<div class="card mb-2">
				<div class="card-header">
					<i class="fas fa-pen-square"></i>
					<div class="card-body">
						<div class="box box-primary">
								<div class="box-body">
									<table class="table table-bordered">
										<thead>
								        	<tr>
								          		<th scope="col">Nombre</th>
								          		<th scope="col">Apellido paterno</th>
								          		<th scope="col">Apellido materno</th>
								          		<th scope="col">Rut</th>
								          		<th scope="col">Direccion</th>
								          		<th scope="col">Correo</th>
								          		<th scope="col">Modificar</th>
								          		<th scope="col">Eliminar</th>
								        	</tr>
								        </thead>
								      	@foreach($administrativos as $p)
								      	<tbody>
								      		<tr>
								      			<td>{{$p->nombre_administrativo}}</td>
								      			<td>{{$p->apellido_paterno}}</td>
								      			<td>{{$p->apellido_materno}}</td>
								      			<td>{{$p->rut}}</td>
								      			<td>{{$p->direccion_administrativo}}</td>
								      			<td>{{$p->correo_administrativo}}</td>
								      			<td><a type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#modal_update-{{$p->id_administrativo}}"><i class="fas fa-pen-square" style="color: white;"></i></a>
								      				@include ('administrativos.modal_update')
								      			</td>
								      			<td><a type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#modal_delete-{{$p->id_administrativo}}"><i class="fas fa-trash" ></i></a>
								      				@include('administrativos.modal_delete')
								      			</td>
								      			<!--<td><a type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#modal_cambiarcurso-{{$p->id_alumnos}}"><i class="fas fa-pen-square"></i></a></td> -->
								      		</tr>
								      	</tbody>
								      	
								      	@endforeach
								    </table>
								    <a type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal_create"><i class="fas fa-plus" style="color: white;"></i></a>
								    @include('administrativos.modal_create')
								</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>



@endsection