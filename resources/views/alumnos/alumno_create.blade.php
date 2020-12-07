@extends('layouts.index')
@section('title', 'nuevo alumno')
@section('contenido')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Nuevo Alumno</h3>
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
							<form role="form" action="/creara" method="POST" class="col offset-md-3">
								@csrf
								<div class="box-body">
									<div class="form-group">
										<label for="nombre_profesor">Nombres del alumno</label><br>
										<input type="text" name="nombres" required><br>
									</div>
									<div class="form-group">
										<label for="ap_profesor">Apellido paterno del alumno</label><br>
										<input type="text" name="apellido_paterno" required><br>
									</div>
									<div class="form-group">
										<label for="ap_profesor">Apellido materno del alumno</label><br>
										<input type="text" name="apellido_materno" required><br>
									</div>
									<div class="form-group">
										<label for="rut_profesor">Rut del alumno</label><br>
										<input type="text" name="rut" required=""><br>
									</div>
									<div class="form-group">
										<label for="rut_profesor">Direccion del alumno</label><br>
										<input type="text" name="direccion" required=""><br>
									</div>
									<div class="form-group">
										<label for="rut_profesor">Correo del alumno</label><br>
										<input type="email" name="correo" required=""><br>
									</div>
									<div class="form-group">
										<select>
											<option selected hidden>Seleccione</option>
											<option>Hola</option>
											<option>Que hace</option>
										</select>
									</div>
									<button type="submit">Enviar</button><br>
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