@extends('layouts.index')
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
					<i class="fas fan-pen-square"></i>
					<div class="card-body">
						<div class="box box-primary">
							<form role="form">
								<div class="box-body">
									<div class="form-group">
										<label for="curso">Seleccione el curso del alumno</label><br>
										<button type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#modal_cursos">Curso</button>
									</div>
									<div class="form-group">
										<label for="anotacion">Escriba la anotacion</label><br>
										<textarea name="anotaciones" rows="5" cols="40"></textarea>
									</div>
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