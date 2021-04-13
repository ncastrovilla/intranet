<?php

namespace App\Http\Controllers;

use App\User;
use App\Profesor;
use App\Alumnos;
use App\Dicta;
use Illuminate\Http\Request;
use App\Asistencia;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Comments;


class AsistenciaController extends Controller
{
	public function indexprofesor(){
		$profesor = Profesor::where('rut',auth()->user()->rut)->first();
		$dicta = Dicta::where('id_profesor',$profesor->id_profesor)->where('año',date('Y'))->get();
		$cursos = DB::table('cuenta')
				->join('dicta','cuenta.id_cuenta','=','dicta.id_cuenta')
				->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
				->join('curso','cuenta.id_curso','=','curso.id_curso')
				->select('cuenta.id_curso','dicta.id_profesor','asignatura.nombre_asignatura','cuenta.id_asignatura','curso.grado','curso.letra')
				->where('dicta.id_profesor','=',$profesor->id_profesor)
				->where('dicta.año','=',date('Y'))
				->get();

		return view('asistencia.asistencia_profesor',compact('cursos'));
	}
	public function indexprofesorold(Request $request){
		$año = $request->input('año');
		$semestre = $request->input('semestre');
		$profesor = Profesor::where('rut',auth()->user()->rut)->first();
		$dicta = Dicta::where('id_profesor',$profesor->id_profesor)->where('año',date('Y'))->get();
		$cursos = DB::table('cuenta')
				->join('dicta','cuenta.id_cuenta','=','dicta.id_cuenta')
				->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
				->join('curso','cuenta.id_curso','=','curso.id_curso')
				->select('cuenta.id_curso','dicta.id_profesor','asignatura.nombre_asignatura','cuenta.id_asignatura','curso.grado','curso.letra')
				->where('dicta.id_profesor','=',$profesor->id_profesor)
				->where('dicta.año','=',$año)
				->get();

		return view('asistencia.asistencia_profesor',compact('cursos','año','semestre'));
	}

	public function indexalumno(){
		$id = Alumnos::where('rut',auth()->user()->rut)->first();
		$alumno = DB::table('alumnos')
				->join('cuenta','alumnos.id_curso','=','cuenta.id_curso')
				->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
				->join('profesor','cuenta.id_profesor','=','profesor.id_profesor')
				->where('alumnos.id_alumnos','=',$id->id_alumnos)
				->get();
				
		return view('asistencia.asistencia_alumnos',compact('alumno'));
	}

	public function asistenciaasignatura(Request $request){
		if($request->old('id_curso')==""){
			$id_curso = $request->input('id_curso');
			$asignatura = $request->input('id_asignatura');
	}else{
		$id_curso = $request->old('id_curso');
		$asignatura = $request->old('id_asignatura');
	}

		$año = $request->input('año');
		$semestre = $request->input('semestre');
		$id = Profesor::where('rut',auth()->user()->rut)->first();
		$profesor = $id->id_profesor;

		if($semestre == 1){
			$asistencias = DB::table('asistencia')
                    			   ->select('id_asistencia','fecha_asistencia','id_curso')
                    			   ->distinct()
                    			   ->where('id_curso','=',$id_curso)
                    			   ->where('id_asignatura','=',$asignatura)
                    			   ->where('id_profesor','=',$profesor)
                    			   ->wheremonth('fecha_asistencia','<=',8)
                    			   ->whereyear('fecha_asistencia',$año)
                    			   ->orderBy('fecha_asistencia')
                    			   ->get();
		}else{
			$asistencias = DB::table('asistencia')
				   ->select('id_asistencia','fecha_asistencia','id_curso')
                   ->distinct()
				   ->where('id_curso','=',$id_curso)
				   ->where('id_asignatura','=',$asignatura)
				   ->where('id_profesor','=',$profesor)
				   ->wheremonth('fecha_asistencia','>',8)
				   ->whereyear('fecha_asistencia',$año)
				   ->orderBy('fecha_asistencia')
				   ->get();
		}

		$nombre_curso = DB::table('curso')
						->where('id_curso','=',$id_curso)
						->get();


		return view('asistencia.asistencia_cursoprofesor',compact('asistencias','nombre_curso','id_curso','asignatura','profesor','año','semestre'));
		
	}

	public function create(Request $request){
		$request->flash(); //guarda los request
		$asistencias = DB::table('asistencia')
						->orderBy('id_asistencia','desc')
						->first();
		
		if($asistencias->id_asistencia==""){
			$id_asistencias = "1";
		}else{
			$id_asistencias = ++$asistencias->id_asistencia;
		}
		

		$id_curso = $request->input('id_curso');

		$alumnos = DB::table('alumnos')
				   ->join('pertenece','alumnos.id_alumnos','pertenece.id_alumno')
				   ->where('pertenece.id_curso','=',$id_curso)
				   ->where('pertenece.año',date('Y'))
				   ->get();
		foreach ($alumnos as $alumno) {
			$asistencia = new Asistencia();
			$asistencia->id_asistencia = $id_asistencias;
			$asistencia->id_alumnos = $alumno->id_alumnos;
			$asistencia->fecha_asistencia = $request->input('fecha');
			if($request->input($alumno->id_alumnos)=='on'){
				$asistencia->presente_asistencia = "Si";	
			}else{
				$asistencia->presente_asistencia = "No";
			}
			
			$asistencia->id_curso = $id_curso;
			$asistencia->id_asignatura = $request->input('id_asignatura');
			$asistencia->id_profesor = $request->input('id_profesor');
			$asistencia->save();
		}

		return Redirect()->back()->withInput(); //vuelve hacia atras con los request guardados
	}

	public function update(Request $request,Asistencia $asistencia){
			$id_asistencia = $request->input('id_asistencia');
			$id_curso = $request->input('id_curso');

			$alumnos = DB::table('alumnos')
					   ->join('pertenece','alumnos.id_alumnos','pertenece.id_alumno')
					   ->where('pertenece.id_curso','=',$id_curso)
					   ->where('pertenece.año',date('Y'))
					   ->get();

			foreach ($alumnos as $alumno) {

				
				
				if($request->input($alumno->id_alumnos)=='on'){
				$asistencias = DB::table('asistencia')
							  ->where('id_asistencia','=',$id_asistencia)
							  ->where('id_alumnos','=',$alumno->id_alumnos)
							  ->update(['presente_asistencia' => "Si"]);
				}else{
					$asistencias = DB::table('asistencia')
							  ->where('id_asistencia','=',$id_asistencia)
							  ->where('id_alumnos','=',$alumno->id_alumnos)
							  ->update(['presente_asistencia' => "No"]);
				
			}
		}
		return Redirect('/asistencia');

	}

	public function delete(Request $request){
		$asistencia = Asistencia::find($request->input('id'));
		$asistencia->delete();

		return Redirect('/asistencia');
	}
}
?>