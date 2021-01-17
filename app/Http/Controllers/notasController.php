<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Notas;
use App\Alumnos;
use App\Profesor;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Comments;


class NotasController extends Controller
{
	public function showa(){
		$profesor = Profesor::where('rut',auth()->user()->rut)->first();

		$alumno = DB::table('cuenta')
				->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
				->join('curso','cuenta.id_curso','=','curso.id_curso')
				->select('cuenta.id_curso','cuenta.id_profesor','asignatura.nombre_asignatura','cuenta.id_asignatura','curso.grado','curso.letra')
				->where('cuenta.id_profesor','=',$profesor->id_profesor)
				->get();
		return view('notas.ver_notas',compact('alumno'));
	}
	public function notasasignatura(Request $request){

		$cursos = $request->input('id_curso');
		$asignatura = $request->input('id_asignatura');

		$parciales = DB::table('notas')
				   ->select('id_notas','descripcion','created_at','id_curso','id_asignatura','id_profesor')
                   ->distinct()
				   ->where('id_curso','=',$cursos)
				   ->where('id_asignatura','=',$asignatura)
				   ->get();

		$nombre_curso = DB::table('curso')
						->where('id_curso','=',$cursos)
						->get();

		return view('notas.notas_profesor',compact('parciales','nombre_curso','cursos','asignatura'));
	}
	public function showalumnos(){
		$id = Alumnos::where('rut',auth()->user()->rut)->first();

		$alumno = DB::table('alumnos')
				->join('cuenta','alumnos.id_curso','=','cuenta.id_curso')
				->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
				->join('profesor','cuenta.id_profesor','=','profesor.id_profesor')
				->where('alumnos.id_alumnos','=',$id->id_alumnos)
				->get();
		return view('notas.ver_notasprofesor',compact('alumno'));
	}

	public function create(Request $request){

		$asistencias = DB::table('notas')
						->orderBy('id_notas','desc')
						->first();
		
		if($asistencias==""){
			$id_asistencias = "1";
		}else{
			$id_asistencias = ++$asistencias->id_notas;
		}

		echo $id_asistencias;
		

			$alumnos = DB::table('alumnos')
					   ->where('id_curso','=',$request->input('id_curso'))
					   ->get();

			foreach ($alumnos as $alumno) {
			$nota = new Notas();
			$nota->id_notas = $id_asistencias;
			$nota->nota = $request->input($alumno->id_alumnos);
			$nota->descripcion = $request->input('descripcion');
			if(DATE('m')>='8')
				$nota->semestre = '2';
			else
				$nota->semestre = '1';
			$nota->año = DATE('Y');
			$nota->id_alumno = $alumno->id_alumnos;
			$nota->id_curso = $request->input('id_curso');
			$nota->id_profesor = $request->input('id_profesor');
			$nota->id_asignatura = $request->input('id_asignatura');
			$nota->save();
			}
		return Redirect('/notas/ver');
	}

	public function update(Request $request, Notas $nota){
			$id_curso = $request->input('id_curso');
			$id_asignatura = $request->input('id_asignatura');
			$descripcion = $request->input('descripcion');

			$alumnos = DB::table('alumnos')
					   ->get();

			foreach ($alumnos as $alumno) {
				$id_notas = $request->input('id_notas');
				$nota = DB::table('notas')
						->where('id_notas','=',$id_notas)
						->where('id_alumno','=',$alumno->id_alumnos)
						->update(['nota'=> $request->input($alumno->id_alumnos)]);
			}
		return Redirect('/notas/ver');
	}
}
?>