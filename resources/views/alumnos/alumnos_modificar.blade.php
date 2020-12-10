@extends('layouts.index')
@section('title', 'modificar alumnos')
@section('contenido')


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Modificar</h3>
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
							<a href="/alumnos"><i class="fas fa-arrow-left">Volver</i></a>
							<form role="form" action="/update" method="POST" class="col offset-md-3">
								@csrf
								<div class="box-body">
									@foreach($alumno as $p)
									<input type="text" name="id" hidden value="{{$p->id}}">
									<div class="form-group">
										<input type="checkbox" id="nombrem" name="nombrem" onclick="cambiarnombre(this)" value="1"> Cambiar Nombre
									</div>
									<div class="form-group">
										<label for="nombre_profesor">Nombres del alumno</label><br>
										<input type="text" id="nombres" name="nombres" value="{{$p->nombre}}" required disabled><br>
									</div>
									<div class="form-group">
										<input type="checkbox" id="rut" name="rut" onclick="cambiarapp(this)"> Cambiar rut
									</div>
									<div class="form-group">
										<label for="ap_profesor">Rut del alumno</label><br>
										<input type="text" id="ru" name="ru" value="{{$p->rut}}"required disabled><br>
									</div>
									<div class="form-group">
										<input type="checkbox" id="dire" name="dire" onclick="cambiarapm(this)"> Cambiar Direccion
									</div>
									<div class="form-group">
										<label for="ap_profesor">Direccion del alumno</label><br>
										<input type="text" id="direccion" name="direccion" value="{{$p->direccion}}"required disabled><br>
									</div>
									<div class="form-group">
										<input type="checkbox" id="correo" name="correo" onclick="cambiarrut(this)"> Cambiar Correo
									</div>
									<div class="form-group">
										<label for="rut_profesor">Correo del alumno</label><br>
										<input type="text" id="corre" name="corre" required=""value="{{$p->correo}}" required disabled><br>
									</div>
									<div class="form-group">
										<input type="checkbox" id="cur" name="cur" onclick="cambiarcorreo(this)"> Cambiar curso
									</div>
									<div class="form-group">
										<label for="rut_profesor">Curso</label><br>
										<input type="email" id="curso" name="curso" required=""value="{{$p->id_curso}}" required disabled><br>
									</div>
									<button type="submit">Enviar</button><br>
									@endforeach
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

<script language="JavaScript">
	function cambiarnombre(checkp){  
    	var nombres = document.getElementById("nombres");
    	nombres.disabled = checkp.checked ? false : true;
    	if(!nombres.disabled){
    		nombres.focus();
    	}
    }

    function cambiarapp(checkp){  
    	var nombres = document.getElementById("ru");
    	nombres.disabled = checkp.checked ? false : true;
    	if(!nombres.disabled){
    		nombres.focus();
    	}
    }
    function cambiarapm(checkp){  
    	var nombres = document.getElementById("direccion");
    	nombres.disabled = checkp.checked ? false : true;
    	if(!nombres.disabled){
    		nombres.focus();
    	}
    }
    function cambiarrut(checkp){  
    	var nombres = document.getElementById("corre");
    	nombres.disabled = checkp.checked ? false : true;
    	if(!nombres.disabled){
    		nombres.focus();
    	}
    }
    function cambiarcorreo(checkp){  
    	var nombres = document.getElementById("curso");
    	nombres.disabled = checkp.checked ? false : true;
    	if(!nombres.disabled){
    		nombres.focus();
    	}
    }
</script>