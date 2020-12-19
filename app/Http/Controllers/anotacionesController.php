<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Notas;
use App\Http\Requests;
use DB;
use App\Comments;


class AnotacionesController extends Controller
{
	public function showp(Request $request){
		$id_curso = $request->input('id_curso');
		$id_asignatura = $request->input('id_asignatura');

		$alumnos = DB::table('alumnos')
				 ->where('id_curso','=',$id_curso)
				 ->get();

		return view('anotaciones.ver_anotaciones',compact('alumnos','id_curso','id_asignatura'));
	}
	
}
?>