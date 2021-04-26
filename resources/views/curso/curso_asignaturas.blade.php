@extends('layouts.plantilla')
@section('title', 'Profesores')
@section('contenido')
<?php use App\Dicta;
	use App\Profesor;
 ?>
<div class="row">
    <div class="col offset-md-1">
    	<br>
      <h3 style="color:#2c6aa0">Asignaturas {{$curso->grado.' '.$curso->letra}} año {{date('Y')}}</h3>
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
								          		<th scope="col">Nombre</th>
								          		<th scope="col">Codigo</th>
								          		<th scope="col">Profesor</th>
								          		<th scope="col">Modificar profesor</th>
								        	</tr>
								        </thead>
								        <tbody>
								      	@foreach($cuenta as $asignatura)
								      	<?php $dicta = Dicta::where('id_cuenta',$asignatura->id_cuenta)->where('año',date('Y'))->first();
								      		if($dicta!=""){
								      		$profesor = Profesor::where('id_profesor',$dicta->id_profesor)->first();
								      		}
								      	?>
								      		<tr>
								      			<td>{{$asignatura->nombre_asignatura}}</td>
								      			<td>{{$asignatura->codigo}}</td>
								      			@if($dicta!="")
								      			<td>{{$profesor->nombres_profesor}}</td>
								      			<td><a type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#modal_modificarprofesor-{{$dicta->id_dicta}}"><i class="fas fa-info-circle"></i></a>
								      			@include('curso.modal_modificarprofesor')
								      			</td>
								      			@else
								      			<td>Profesor no asignado</td>
								      			<td><a type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#modal_asignaturaprofesor-{{$asignatura->id_cuenta}}"><i class="fas fa-info-circle"></i></a>
								      			@include('curso.modal_asignaturaprofesor')</td>
								      			@endif
								      		</tr>
								      	@endforeach
								      	</tbody>
								    </table>
								    
								</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

@endsection