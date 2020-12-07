<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Profesor;
use App\Alumnos;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Comments;


class IDMController extends Controller
{
	public function createa(Request $request){
		$alumno = new Alumnos();
		$alumno->nombre = $request->input('nombres');
		$alumno->apellido_paterno = $request->input('apellido_paterno');
		$alumno->apellido_materno = $request->input('apellido_materno');
		$alumno->rut = $request->input('rut');
		$alumno->direccion = $request->input('direccion');
		$alumno->correo = $request->input('correo');
		$alumno->id_curso = $request->input('id_curso');
		$alumno->save();
		
		return view('InsertModifyDeleteBD.alumno_create')->with('success','Prueba correctamente realizada');
	}
}
?>