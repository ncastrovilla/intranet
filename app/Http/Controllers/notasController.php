<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Notas;
use App\Alumnos;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Comments;


class NotasController extends Controller
{
	public function showa(){
		$alumno = DB::table('cuenta')
				->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
				->join('curso','cuenta.id_curso','=','curso.id_curso')
				->select('cuenta.id_curso','cuenta.id_profesor','asignatura.nombre_asignatura','cuenta.id_asignatura','curso.grado','curso.letra')
				->where('cuenta.id_profesor','=','1')
				->get();
		return view('notas.ver_notas',compact('alumno'));
	}
	public function showalumnos(){
		$alumno = DB::table('alumnos')
				->join('cuenta','alumnos.id_curso','=','cuenta.id_curso')
				->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
				->join('profesor','cuenta.id_profesor','=','profesor.id_profesor')
				->where('alumnos.id_alumnos','=','5')
				->get();
		return view('notas.ver_notasprofesor',compact('alumno'));
	}

	public function create(Request $request){
			$nota = new Notas();
			$nota->nota = $request->input('nota');
			$nota->descripcion = $request->input('descripcion');
			$nota->semestre = '2';
			$nota->año = $request->input('año');
			$nota->id_alumno = $request->input('id_alumnos');
			$nota->id_curso = $request->input('id_curso');
			$nota->id_profesor = $request->input('id_profesor');
			$nota->id_asignatura = $request->input('id_asignatura');
			$nota->save();
		return Redirect('/notas/ver');
	}
}
?>