@extends('layouts.plantilla')
@section('title', 'Profesores')
@section('contenido')
<div class="row">
    <div class="col offset-md-1">
    	<br>
      <h3 style="color:#2c6aa0">Profesores</h3>
    </div>
    <div class="offset-md-1">
    </div>
</div>
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("profesor");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
$(document).ready( function () {
    $('#profesor').DataTable();
} );
</script>

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
									<div class="bs-callout bs-callout-info">
										<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar profesor por rut">
									</div>
									<table id="profesor" class="table table-bordered">
										<thead>
								        	<tr>
								          		<th scope="col">Nombre</th>
								          		<th scope="col">Apellido Paterno</th>
								          		<th scope="col">Apellido Materno</th>
								          		<th scope="col">Rut</th>
								          		<th scope="col">Correo</th>
								          		<th scope="col">Asignaturas</th>
								          		<th scope="col">Modificar</th>
								          		<th scope="col">Eliminar</th>
								          		<th>Ver asignaturas</th>
								          		<th scope="col">Asignar asigatura</th>
								        	</tr>
								        </thead>
								        <tbody>
								      	@foreach($profesor as $p)
								      	<?php $asignaturas = DB::table('cuenta')
                                       ->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
                                       ->join('curso','cuenta.id_curso','=','curso.id_curso')
                                       ->select('asignatura.nombre_asignatura','curso.grado','curso.letra')
                                       ->where('cuenta.id_profesor','=',$p->id_profesor)
                                       ->get();
                                       ?>
								      		<tr>
								      			<td>{{$p->nombres_profesor}}</td>
								      			<td>{{$p->apellido_paterno}}</td>
								      			<td>{{$p->apellido_materno}}</td>
								      			<td>{{$p->rut}}</td>
								      			<td>{{$p->correo}}</td>
								      			<td>@foreach($asignaturas as $a)
								      				<li>{{$a->nombre_asignatura.' '.$a->grado.' '.$a->letra}}</li>
								      				@endforeach
								      			</td>
								      			<td><a type="button" class="btn btn-primary btn-sm btn-block " data-toggle="modal" data-target="#modal_edit-{{$p->id_profesor}}"><i class="fas fa-pen"></i></a></td>
								      			<td><a type="button" class="btn btn-danger btn-sm btn-block " data-toggle="modal" data-target="#modal_delete-{{$p->id_profesor}}"><i class="fas fa-trash"></i></a></td>
								      			<td><a type="button" class="btn btn-danger btn-sm btn-block " data-toggle="modal" data-target="#modal_verasignaturas-{{$p->id_profesor}}"><i class="fas fa-trash"></i></a>
								      		@include('profesores.modal_verasignaturas')
								      			</td>
								      			<td><a type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#modal_asignarasignatura-{{$p->id_profesor}}"><i class="fas fa-book"></i></a>

								      		@include('profesores.modal_asignarasignatura')
								      			</td>
								      		</tr>
								      		@include('profesores.modal_edit')
											@include('profesores.modal_delete')
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