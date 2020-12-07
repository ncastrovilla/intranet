@extends('layouts.index')
@section('title', 'modificar profesor')
@section('contenido')


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Modificar</h3>
      <button class="button" ><i class="fas fa-arrow-left"><a href="/profesores"></a></i></button>
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
							<form role="form" action="/update" method="POST" class="col offset-md-3">
								@csrf
								<div class="box-body">
									@foreach($profesor as $p)
									<input type="text" name="id" hidden value="{{$p->id}}">
									<div class="form-group">
										<input type="checkbox" id="nombrem" name="nombrem" onclick="cambiarnombre(this)" value="1"> Cambiar Nombre
									</div>
									<div class="form-group">
										<label for="nombre_profesor">Nombres del profesor</label><br>
										<input type="text" id="nombres" name="nombres" value="{{$p->nombres}}" required disabled><br>
									</div>
									<div class="form-group">
										<input type="checkbox" id="app" name="app" onclick="cambiarapp(this)"> Cambiar apellido paterno
									</div>
									<div class="form-group">
										<label for="ap_profesor">Apellido paterno del profesor</label><br>
										<input type="text" id="apellido_paterno" name="apellido_paterno" value="{{$p->apellido_paterno}}"required disabled><br>
									</div>
									<div class="form-group">
										<input type="checkbox" id="apm" name="apm" onclick="cambiarapm(this)"> Cambiar apellido materno
									</div>
									<div class="form-group">
										<label for="ap_profesor">Apellido materno del profesor</label><br>
										<input type="text" id="apellido_materno" name="apellido_materno" value="{{$p->apellido_materno}}"required disabled><br>
									</div>
									<div class="form-group">
										<input type="checkbox" id="rut" name="rut" onclick="cambiarrut(this)"> Cambiar rut
									</div>
									<div class="form-group">
										<label for="rut_profesor">Rut del profesor</label><br>
										<input type="text" id="rut" name="rut" required=""value="{{$p->rut}}" required disabled><br>
									</div>
									<div class="form-group">
										<input type="checkbox" id="correo" name="correo" onclick="cambiarcorreo(this)"> Cambiar correo
									</div>
									<div class="form-group">
										<label for="rut_profesor">Correo del profesor</label><br>
										<input type="email" id="correo" name="correo" required=""value="{{$p->correo}}" required disabled><br>
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
    	var nombres = document.getElementById("apellido_paterno");
    	nombres.disabled = checkp.checked ? false : true;
    	if(!nombres.disabled){
    		nombres.focus();
    	}
    }
    function cambiarapm(checkp){  
    	var nombres = document.getElementById("apellido_materno");
    	nombres.disabled = checkp.checked ? false : true;
    	if(!nombres.disabled){
    		nombres.focus();
    	}
    }
    function cambiarrut(checkp){  
    	var nombres = document.getElementById("rut");
    	nombres.disabled = checkp.checked ? false : true;
    	if(!nombres.disabled){
    		nombres.focus();
    	}
    }
    function cambiarcorreo(checkp){  
    	var nombres = document.getElementById("correo");
    	nombres.disabled = checkp.checked ? false : true;
    	if(!nombres.disabled){
    		nombres.focus();
    	}
    }
</script>