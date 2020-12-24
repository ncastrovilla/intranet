<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Asistencia;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Comments;


class AsistenciaController extends Controller
{
	public function indexprofesor(){
		$cursos = DB::table('cuenta')
				->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
				->join('curso','cuenta.id_curso','=','curso.id_curso')
				->select('cuenta.id_curso','cuenta.id_profesor','asignatura.nombre_asignatura','cuenta.id_asignatura','curso.grado','curso.letra')
				->where('cuenta.id_profesor','=','3')
				->get();

		return view('asistencia.asistencia_profesor',compact('cursos'));
	}

	public function indexalumno(){
		$alumno = DB::table('alumnos')
				->join('cuenta','alumnos.id_curso','=','cuenta.id_curso')
				->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
				->join('profesor','cuenta.id_profesor','=','profesor.id_profesor')
				->where('alumnos.id_alumnos','=','3')
				->get();
				
		return view('asistencia.asistencia_alumnos',compact('alumno'));
	}

	public function asistenciaasignatura(Request $request){
		$id_curso = $request->input('id_curso');
		$asignatura = $request->input('id_asignatura');
		$profesor = $request->input('id_profesor');
		$asistencias = DB::table('asistencia')
				   ->select('id_asistencia','fecha_asistencia')
                   ->distinct()
				   ->where('id_curso','=',$id_curso)
				   ->where('id_asignatura','=',$asignatura)
				   ->where('id_profesor','=',$profesor)
				   ->get();

		$nombre_curso = DB::table('curso')
						->where('id_curso','=',$id_curso)
						->get();


		return view('asistencia.asistencia_cursoprofesor',compact('asistencias','nombre_curso','id_curso','asignatura','profesor'));
	}
	public function create(Request $request){
		$asistencias = DB::table('asistencia')
						->orderBy('id_asistencia','desc')
						->first();
		
		if($asistencias==""){
			$id_asistencias = "1";
		}else{
			$id_asistencias = ++$asistencias->id_asistencia;
		}
		

		$id_curso = $request->input('id_curso');

		$alumnos = DB::table('alumnos')
				   ->where('id_curso','=',$id_curso)
				   ->get();
		foreach ($alumnos as $alumno) {
			$asistencia = new Asistencia();
			$asistencia->id_asistencia = $id_asistencias;
			$asistencia->id_alumnos = $alumno->id_alumnos;
			$asistencia->fecha_asistencia = $request->input('fecha');
			$asistencia->presente_asistencia = $request->input($alumno->id_alumnos);
			$asistencia->id_curso = $id_curso;
			$asistencia->id_asignatura = $request->input('id_asignatura');
			$asistencia->id_profesor = $request->input('id_profesor');
			$asistencia->save();
		}

		return Redirect('/asistencia');

		

	}
}
?>