<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Administradores;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Comments;


class AdministradoresController extends Controller
{
	public function create(Request $request){
		$administrador = new Administradores();

		$administrador->nombre_administrador = $request->input('nombres');
		$administrador->apellido_paterno = $request->input('apellido_paterno');
		$administrador->apellido_materno = $request->input('apellido_materno');
		$administrador->rut = $request->input('rut');
		$administrador->correo_administrador = $request->input('correo');
		$administrador->direccion_administrador = $request->input('direccion');

		$administrador->save();

		return Redirect('/administradores');
	}
	public function show(){
		$administradores = Administradores::all();

		return view('administradores.administradores_index',compact('administradores'));
	}

	public function delete(Request $request, Administrativos $administrativo){
		$administrador = Administradores::find($request->input('id'));

		$administrador->delete();

		return Redirect("/administradores");
	}

	public function update(Request $request){

		$administrador = Administrativos::find($request->input('id'));

		$administrador->nombre_administrador = $request->input('nombres');
		$administrador->apellido_paterno = $request->input('apellido_paterno');
		$administrador->apellido_materno = $request->input('apellido_materno');
		$administrador->rut = $request->input('rut');
		$administrador->correo_administrador = $request->input('correo');
		$administrador->direccion_administrador = $request->input('direccion');

		$administrador->update();

		return Redirect('/administradores');
	}
}
?>