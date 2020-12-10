@extends('layouts.index')
@section('title', 'Profesores')
@section('contenido')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Profesores</h3>
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
								          		<th scope="col">Apellido Paterno</th>
								          		<th scope="col">Apellido Materno</th>
								          		<th scope="col">Rut</th>
								          		<th scope="col">Correo</th>
								          		<th scope="col">Modificar</th>
								          		<th scope="col">Eliminar</th>
								        	</tr>
								        </thead>
								      	@foreach($profesor as $p)
								      	<tbody>
								      		<tr>
								      			<td>{{$p->nombres_profesor}}</td>
								      			<td>{{$p->apellido_paterno}}</td>
								      			<td>{{$p->apellido_materno}}</td>
								      			<td>{{$p->rut}}</td>
								      			<td>{{$p->correo}}</td>
								      			<td><a type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#modal_edit-{{$p->id_profesor}}"><i class="fas fa-pen"></i></a></td>
								      			<td><a type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#modal_delete-{{$p->id_profesor}}"><i class="fas fa-trash"></i></a></td>
								      		</tr>
								      	</tbody>

										@include('profesores.modal_edit')
										@include('profesores.modal_delete')
								      	@endforeach
								    </table>
								    <th scope="col">
								    <a type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#modal_create"><i class="fas fa-pen"></i></a>
								    @include('profesores.modal_create')
									</th>
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