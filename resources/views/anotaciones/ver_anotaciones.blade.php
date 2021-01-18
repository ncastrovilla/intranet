@extends('layouts.plantilla')
@section('title', 'ver anotaciones')
@section('contenido')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Anotaciones</h3>
    </div>
    <div class="offset-md-1">
    </div>
</div>
<div id="content-wrapper">
	<div class="row">
		<div class="col offset-md-1">
			<div class="card mb-3">
				<div class="card-header">
      				<a type="button" class="btn btn-info btn-sm" href="/notas/ver"><i class="fas fa-arrow-left"></i></a>
					<div class="card-body">
						<div class="box box-primary">
							<div class="box-body">
								<div class="form-group">
                    				<table class="table table-bordered">
                      					<tr>
                      						<th scope="col">Alumnos</th>
					                        <th scope="col">Grado</th>
					                        <th scope="col">Letra</th>
					                        <th scope="col">Notas</th>
					                        <th scope="col">Anotaciones</th>
					                        <th scope="col">Modificar</th>
					                    </tr>
                      					@foreach($alumnos as $alumno)
                        				<tr>
                          					<td>{{$alumno->nombre_alumnos}}</td>
                          					<td></td>
                          					<td></td>
                          					<td></td>
					                        <td>
					                        	<a type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#modal_anotacionesprofesor-{{$id_curso}}-{{$id_asignatura}}-{{$alumno->id_alumnos}}"><i class="fas fa-info"></i></a>
					                        </td>
					                        <td>
					                        	<a type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#"><i class="fas fa-upload"></i></a>
					                        </td>
					                        </tr>
					                        @include('anotaciones.modal_anotacionesprofesor')
                      @endforeach
                    </table>
                  </div>
								</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>







@endsection