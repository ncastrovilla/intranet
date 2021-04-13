<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Alumnos;
use App\Pertenece;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\hash;
use DB;
\Session::flash('message', 'store');
use App\Comments;


class AlumnosController extends Controller
{
	public function create(Request $request){

		$validatedData = $request->validate([
        'nombres' => 'required',
        'apellido_paterno' => 'required',
    ]);

		$alumno = new Alumnos();
		$alumno->nombre_alumnos = $request->input('nombres');
		$alumno->apellido_paterno = $request->input('apellido_paterno');
		$alumno->apellido_materno = $request->input('apellido_materno');
		$alumno->rut = $request->input('rut');
		$alumno->direccion = $request->input('direccion');
		$alumno->correo_alumnos = $request->input('correo');
		$alumno->save();

		$user = new User();

		$user->name = $request->input('nombres').' '.$request->input('apellido_paterno').' '.$request->input('apellido_materno');
		$user->email = $request->input('correo');
		$user->rut = $request->input('rut');
		$user->password = Hash::make($request->input('rut'));
		$user->rol = 3;
		$user->save();

		$id = DB::table('alumnos')
						->orderBy('id_alumnos','desc')
						->first();
		
		if($id==""){
			$id_asistencias = "1";
		}else{
			$id_asistencias = $id->id_alumnos;
		}

		echo $id_asistencias;

		$pertenece = new Pertenece();
		$pertenece->id_curso = $request->input('id_curso');
		$pertenece->id_alumno = $id_asistencias;
		$pertenece->año = date('Y');
		$pertenece->save();

		return Redirect('/alumnos');

	}

	public function contraseña(Request $request){
			$alumno = User::where('rut',auth()->user()->rut)->first();
			$antigua1 = $request->input('contraseñaant');
			$antigua = Hash::make($request->input('contraseñaant'));
			$nueva = $request->input('contranueva');
			$repite = $request->input('contranuevaagain');


			if (Hash::check($antigua1, $alumno->password)) {
				if ($antigua == $nueva) {
					# code...
				}
    		}
			/*
			*/
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