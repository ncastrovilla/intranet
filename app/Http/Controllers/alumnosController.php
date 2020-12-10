<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Alumnos;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Comments;


class AlumnosController extends Controller
{
	public function create(Request $request){
		$alumno = new Alumnos();
		$alumno->nombre = $request->input('nombres');
		$alumno->rut = $request->input('rut');
		$alumno->direccion = $request->input('direccion');
		$alumno->correo = $request->input('correo');
		$alumno->id_curso = $request->input('id_curso');
		$alumno->save();

		return Redirect('/alumnos');
	}
	public function show(){
		$alumno = DB::table('alumnos')
					->get();
		return view('alumnos.alumnos_index',compact('alumno'));
	}
	public function modificar(Request $request){
		$id = $request->input('llave_primaria');

		$alumno = DB::table('alumnos')
					->where('id','=',$request->input('llave_primaria'))
					->get();
		
		return view('alumnos.alumnos_modificar',compact('alumno'));
		
	}
	public function delete(Request $request){
		$id = $request->input('llave_primaria');

		DB::table('alumnos')
			->where('id','=',$id)
			->delete();

		return Redirect('/alumnos');
	}

	public function update(Request $request){

		$id = $request->input('id');

		if($request->input('nombrem')=='1'){
			
			DB::table('alumnos')
				->where('id','=',$id)
				->update(['nombres' => $request->input('nombres')]);
		}
		if($request->input('app')=='on'){
			
			DB::table('alumnos')
				->where('id','=',$id)
				->update(['apellido_paterno' => $request->input('apellido_paterno')]);
			
		}
		if($request->input('apm')=='on'){
			
			DB::table('alumnos')
				->where('id','=',$id)
				->update(['apellido_materno' => $request->input('apellido_materno')]);
			
		}
		if($request->input('rut')=='on'){
			
			DB::table('alumnos')
				->where('id','=',$id)
				->update(['rut' => $request->input('ru')]);
			
		}
		if($request->input('correo')=='on'){
			
			DB::table('alumnos')
				->where('id','=',$id)
				->update(['correo' => $request->input('corre')]);
			
		}

		return Redirect('/alumnos');

	}
}
?>