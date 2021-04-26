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
        'apellido_materno' => 'required',
        'rut' => 'required',
        'direccion' => 'required',
        'correo' => 'required',
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
		
			$id_asistencias = $id->id_alumnos;

		$pertenece = new Pertenece();
		$pertenece->id_curso = $request->input('id_curso');
		$pertenece->id_alumno = $id_asistencias;
		$pertenece->año = date('Y');
		$pertenece->save();

		return Redirect('/alumnos');

	}


	public function contraseña(Request $request){
			$administrador = User::where('rut',auth()->user()->rut)->first();
			$antigua1 = $request->input('contraseñaant');
			$nueva = Hash::make($request->input('contranueva'));
			$repite = $request->input('contranuevaagain');


			if (Hash::check($antigua1, $administrador->password)) {
				$administrador->password = Hash::make($nueva);
				$administrador->update();
				return Redirect('/')->withSuccess('Contraseña actualizada');
    		}else{
    			return Redirect('/')->withErrors(['La contraseña antigua es incorrecta']);
    		}
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
	public function promover(Request $request){
		$id_curso = $request->input('id_curso');
		$e=0;
		if(date('m')==12){
			$año = date('Y');
			$añosig = date('Y')+1;
		}else{
			$año = date('Y')-1;
			$añosig = date('Y');
		}
		$alumnos = DB::table('alumnos')
				   ->join('pertenece','alumnos.id_alumnos','pertenece.id_alumno')
				   ->where('pertenece.id_curso','=',$id_curso)
				   ->where('pertenece.año',$año)
				   ->get();

		$cursonuevo = DB::table('alumnos')
				   ->join('pertenece','alumnos.id_alumnos','pertenece.id_alumno')
				   ->where('pertenece.id_curso','=',$request->input('curso'))
				   ->where('pertenece.año',$añosig)
				   ->get();

		foreach ($alumnos as $alumno) {
			if(!$cursonuevo->isEmpty()) // si hay algun alumno registrado ese año
			{
				foreach ($cursonuevo as $c) { //recorre ese año
					if($c->id_alumnos == $alumno->id_alumnos){ //si esta el alumno
						$e=1;
						break;
					}else{ // si no esta
						echo "Año= ";
						echo $año;
						echo "/";
						$e=0;
					}
					echo $e; //verifica si es o no es
				}
			}else{ //si no hay alumnos registrados
				echo "No hay alumnos registrados para ese año";
			}
			}
			/*
			if($request->input($alumno->id_alumnos)=='on'){
				$pertenece = new Pertenece();
				$pertenece->id_curso = $request->input('curso');
				$pertenece->año = $añosig;
				$pertenece->saver();
			}
			*/
			
		
	}
}
?>