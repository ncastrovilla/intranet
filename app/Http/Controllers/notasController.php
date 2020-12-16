<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Htpp\Request;
use App\Notas;
use App\Alumnos;
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
}
?>