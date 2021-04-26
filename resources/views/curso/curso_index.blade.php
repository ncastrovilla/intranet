@extends('layouts.plantilla')
@section('title', 'Profesores')
@section('contenido')
<div class="row">
    <div class="col offset-md-1">
    	<br>
      <h3 style="color:#2c6aa0">Cursos</h3>
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
								          		<th scope="col">Grado</th>
								          		<th scope="col">Letra</th>
								          		<th scope="col">Ver alumnos</th>
								          		<th scope="col">Ver asignaturas</th>
								        	</tr>
								        </thead>
								        <tbody>
								      	@foreach($cursos as $curso)
								      		<tr>
								      			<td>{{$curso->grado}}</td>
								      			<td>{{$curso->letra}}</td>
								      			<td>
								      				<form action="/cursos/alumnos" method="post">
								      					@csrf
								      					<input type="text" name="id_curso" value="{{$curso->id_curso}}" hidden>
								      					<button type="submit" class="btn btn-info btn-sm btn-block"><i class="fas fa-users"></i></button>
								      				</form>
								      			</td>
								      			<td>
								      				<form action="/cursos/asignaturas" method="post">
								      					@csrf
								      					<input type="text" name="id_curso" value="{{$curso->id_curso}}" hidden>
								      					<button type="submit" class="btn btn-info btn-sm btn-block"><i class="fas fa-book"></i></button>
								      				</form>
								      			</td>
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