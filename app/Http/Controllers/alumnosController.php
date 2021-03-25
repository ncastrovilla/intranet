<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Alumnos;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Comments;


class AlumnosController extends Controller
{
	public function create(Request $request){
		$alumno = new Alumnos();
		$alumno->nombre_alumnos = $request->input('nombres');
		$alumno->apellido_paterno = $request->input('apellido_paterno');
		$alumno->apellido_materno = $request->input('apellido_materno');
		$alumno->rut = $request->input('rut');
		$alumno->direccion = $request->input('direccion');
		$alumno->correo_alumnos = $request->input('correo');
		$alumno->id_curso = $request->input('id_curso');
		$alumno->save();

		return Redirect('/alumnos');
	}
	public function show(){
		$alumno = DB::table('alumnos')
					->get();
		return view('alumnos.alumnos_index',compact('alumno'));
	}

	public function delete(Request $request, Alumnos $alumnos){
		$id = $request->input('id');

		$alumnos = Alumnos::find($id);
		$alumnos->delete();

		return Redirect('/alumnos');
	}

	public function update(Request $request, Alumnos $alumnos){

		$id = $request->input('id');

		$alumnos = Alumnos::find($id);
		$alumnos->nombre_alumnos = $request->input('nombres');
		$alumnos->apellido_paterno = $request->input('apellido_paterno');
		$alumnos->apellido_materno = $request->input('apellido_materno');
		$alumnos->rut = $request->input('rut');
		$alumnos->correo_alumnos = $request->input('correo');
		$alumnos->direccion = $request->input('direccion');
		$alumnos->update();

		return Redirect('/alumnos');

	}
}
?>