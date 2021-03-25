<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Administrativos;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Comments;


class AdministrativosController extends Controller
{
	public function create(Request $request){
		$administrativo = new Administrativos();

		$administrativo->nombre_administrativo = $request->input('nombres');
		$administrativo->apellido_paterno = $request->input('apellido_paterno');
		$administrativo->apellido_materno = $request->input('apellido_materno');
		$administrativo->rut = $request->input('rut');
		$administrativo->correo_administrativo = $request->input('correo');
		$administrativo->direccion_administrativo = $request->input('direccion');

		$administrativo->save();

		return Redirect('/administrativos');
	}
	public function show(){
		$administrativos = Administrativos::all();

		return view('administrativos.administrativos_index',compact('administrativos'));
	}

	public function delete(Request $request, Administrativos $administrativo){
		$administrativo = Administrativos::find($request->input('id'));

		$administrativo->delete();

		return Redirect("/administrativos");
	}

	public function update(Request $request, Administrativos $administrativo){

		$administrativo = Administrativos::find($request->input('id'));

		$administrativo->nombre_administrativo = $request->input('nombres');
		$administrativo->apellido_paterno = $request->input('apellido_paterno');
		$administrativo->apellido_materno = $request->input('apellido_materno');
		$administrativo->rut = $request->input('rut');
		$administrativo->correo_administrativo = $request->input('correo');
		$administrativo->direccion_administrativo = $request->input('direccion');

		$administrativo->update();

		return Redirect('/administrativos');
	}
}
?>