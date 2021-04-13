@extends('layouts.plantilla')
@section('title', 'Profesores')
@section('contenido')
<div class="row">
    <div class="col offset-md-1">
    	<br>
      <h3 style="color:#2c6aa0">Alumnos {{$curso->grado.' '.$curso->letra}} año {{date('Y')}}</h3>
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
					<i class="fas fan-pen-square"></i>
					<div class="card-body">
						<div class="box box-primary">
								<div class="box-body">
									<table id="profesor" class="table table-bordered">
										<thead>
								        	<tr>
								          		<th scope="col">Alumno</th>
								          		<th scope="col">Rut</th>
								          		<th scope="col">Gestionar</th>
								        	</tr>
								        </thead>
								        <tbody>
								      	@foreach($id_curso as $curso)
								      		<tr>
								      			<td>{{$curso->nombre_alumnos.' '.$curso->apellido_paterno.' '.$curso->apellido_materno}}</td>
								      			<td>{{$curso->rut}}</td>
								      			<td><a href="/alumnos" type="button" class="btn btn-sm btn-info"><i class="fas fa-user"></i></a></td>
								      		</tr>
								      	@endforeach
								      	</tbody>
								    </table>
								    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal_create"><i class="fas fa-plus"></i></a></button>
								    @include('profesores.modal_create')
								</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

@endsection