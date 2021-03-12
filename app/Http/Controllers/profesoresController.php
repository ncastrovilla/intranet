<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Profesor;
use App\Cuenta;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\hash;
use DB;
use App\Comments;


class ProfesoresController extends Controller
{
	public function create(Request $request){
		$profesor = new Profesor();
		$profesor->nombres_profesor = $request->input('nombres');
		$profesor->apellido_paterno = $request->input('apellido_paterno');
		$profesor->apellido_materno = $request->input('apellido_materno');
		$profesor->rut = $request->input('rut');
		$profesor->correo = $request->input('correo');
		$profesor->save();

		return Redirect('/profesores');
	}

	public function show(){
		$profesor = DB::table('profesor')
					->get();
		return view('Profesores.index',compact('profesor'));
	}
	public function modificar(Request $request){
		$id = $request->input('llave_primaria');

		$profesor = DB::table('profesor')
					->where('profesor.id_profesor','=',$request->input('llave_primaria'))
					->get();
		
		return view('Profesores.modificar_profesores',compact('profesor'));
		
	}
	public function delete(Request $request, Profesor $profesor){
		$id = $request->input('id');

		$profesor = Profesor::find($id);
		$profesor->delete();

		return Redirect('/profesores');
	}

	public function update(Request $request, Profesor $profesor){

		$id = $request->input('id');

		
			
			$profesor = Profesor::find($id);
			$profesor->nombres_profesor = $request->input('nombres');
			$profesor->apellido_paterno = $request->input('apellido_paterno');
			$profesor->apellido_materno = $request->input('apellido_materno');
			$profesor->rut = $request->input('rut');
			$profesor->correo = $request->input('correo');
			$profesor->update();

		return Redirect('/profesores');

	}
	public function asignarasignaturas(Request $request){
			$id_profesor = $request->input('id');

			$cuenta = new Cuenta();
			$cuenta->id_curso = $request->input('curso');
			$cuenta->id_profesor = $id_profesor;
			$cuenta->id_asignatura = $request->input('asignatura');
			$cuenta->save();

			return Redirect('/profesores');
	}
}
?>