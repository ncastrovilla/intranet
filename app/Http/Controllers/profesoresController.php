<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Profesor;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Comments;


class ProfesoresController extends Controller
{
	public function create(Request $request){
		$profesor = new Profesor();
		$profesor->nombres = $request->input('nombres');
		$profesor->apellido_paterno = $request->input('apellido_paterno');
		$profesor->apellido_materno = $request->input('apellido_materno');
		$profesor->rut = $request->input('rut');
		$profesor->correo = $request->input('correo');
		$profesor->save();

		return view('profesores.index')->with('success','Prueba correctamente realizada');
	}
	public function show(){
		$profesor = DB::table('profesor')
					->get();
		return view('Profesores.index',compact('profesor'));
	}
	public function modificar(Request $request){
		$id = $request->input('llave_primaria');

		$profesor = DB::table('profesor')
					->where('profesor.id','=',$request->input('llave_primaria'))
					->get();
		
		return view('Profesores.modificar_profesores',compact('profesor'));
		
	}
	public function delete(Request $request){
		$id = $request->input('llave_primaria');

		DB::table('profesor')
			->where('id','=',$id)
			->delete();

		return Redirect('/profesores');
	}

	public function update(Request $request){

		$id = $request->input('id');

		if($request->input('nombrem')=='1'){
			
			DB::table('profesor')
				->where('id','=',$id)
				->update(['nombres' => $request->input('nombres')]);
		}
		if($request->input('app')=='1'){
			
			DB::table('profesor')
				->where('id','=',$id)
				->update(['apellido_paterno' => $request->input('apellido_paterno')]);
			
		}
		if($request->input('apm')=='1'){
			
			DB::table('profesor')
				->where('id','=',$id)
				->update(['apellido_materno' => $request->input('apellido_materno')]);
			
		}
		if($request->input('rut')=='1'){
			
			DB::table('profesor')
				->where('id','=',$id)
				->update(['rut' => $request->input('rut')]);
			
		}
		if($request->input('correo')=='1'){
			
			DB::table('profesor')
				->where('id','=',$id)
				->update(['correo' => $request->input('correo')]);
			
		}

		return Redirect('/profesores');

	}
}
?>