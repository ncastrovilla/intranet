@extends('layouts.index')
@section('title', 'nuevo profesor')
@section('contenido')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Nuevo profesor</h3>
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
							<form role="form" action="/crear" method="POST" class="col offset-md-3">
								@csrf
								<div class="box-body">
									<div class="form-group">
										<label for="nombre_profesor">Nombres del profesor</label><br>
										<input type="text" name="nombres" required><br>
									</div>
									<div class="form-group">
										<label for="ap_profesor">Apellido paterno del profesor</label><br>
										<input type="text" name="apellido_paterno" required><br>
									</div>
									<div class="form-group">
										<label for="ap_profesor">Apellido materno del profesor</label><br>
										<input type="text" name="apellido_materno" required><br>
									</div>
									<div class="form-group">
										<label for="rut_profesor">Rut del profesor</label><br>
										<input type="text" name="rut" required=""><br>
									</div>
									<div class="form-group">
										<label for="rut_profesor">Correo del profesor</label><br>
										<input type="email" name="correo" required=""><br>
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