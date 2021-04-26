<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Notas;
use App\Curso;
use App\Alumnos;
use App\Pertenece;
use App\Dicta;
use App\Profesor;
use App\Ponderaciones;
use App\Cuenta;
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

		$profesor = Profesor::where('rut',auth()->user()->rut)->first();

		$año = $request->input('año');
		$semestre = $request->input('semestre');

		$dicta2 = DB::table('dicta')
				 ->join('cuenta','dicta.id_cuenta','cuenta.id_cuenta')
				 ->select('dicta.id_dicta')
				 ->where('cuenta.id_curso',$cursos)
				 ->where('cuenta.id_asignatura',$asignatura)
				 ->where('dicta.año',$año)
				 ->where('dicta.id_profesor',$profesor->id_profesor)
				 ->get();
		
		foreach ($dicta2 as $v) {
			$dicta = $v->id_dicta;
		}

		$nombre_curso = DB::table('curso')
						->where('id_curso','=',$cursos)
						->get();

		$cuenta = Cuenta::where('id_curso',$cursos)->where('id_asignatura',$asignatura)->first();

		return view('notas.notas_profesor',compact('nombre_curso','cursos','asignatura','año','semestre','dicta'));
	}

	public function ponderacioncreate(Request $request){
		$dicta = $request->input('dicta');

		if (date('m')<8) {
			$semestre = 1;
		}else{
			$semestre = 2;
		}

		$ponderacion = new Ponderaciones();
		$ponderacion->id_dicta = $dicta;
		$ponderacion->descripcion_ponderacion = $request->input('descripcion');
		$ponderacion->cantidad = $request->input('cantidad');
		$ponderacion->semestre = $semestre;
		$ponderacion->porcentaje = $request->input('porcentaje');
		$ponderacion->save();

		return Redirect('/asistencia');

	}
	public function ponderacioneditar(Request $request){

		$ponderacion = Ponderaciones::find($request->input('id'));
		$ponderacion->descripcion_ponderacion = $request->input('descripcion');
		$ponderacion->cantidad = $request->input('cantidad');
		$ponderacion->porcentaje = $request->input('porcentaje');
		$ponderacion->update();

		return Redirect('/asistencia');

	}
	public function showalumnos(){
		$id = Alumnos::where('rut',auth()->user()->rut)->first();

		$pertenece = Pertenece::where('id_alumno',$id->id_alumnos)->where('año',date('Y'))->first();

		$curso = Curso::where('id_curso',$pertenece->id_curso)->first();

		$alumno = DB::table('alumnos')
				->join('pertenece','alumnos.id_alumnos','=','pertenece.id_alumno')
				->join('cuenta','pertenece.id_curso','=','cuenta.id_curso')
				->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
				->join('dicta','dicta.id_cuenta','cuenta.id_cuenta')
				->join('profesor','dicta.id_profesor','=','profesor.id_profesor')
				->where('alumnos.id_alumnos','=',$id->id_alumnos)
				->where('pertenece.año','=',date('Y'))
				->where('dicta.año',date('Y'))
				->get();

		$asignaturas = Cuenta::where('id_curso',$curso->id_curso)->count();
		return view('notas.ver_notasalumno',compact('alumno','curso','asignaturas'));
	}

	public function showalumnosold(Request $request){
		$id = Alumnos::where('rut',auth()->user()->rut)->first();
		$año = $request->input('año');
		$semestre = $request->input('semestre');
		$pertenece = Pertenece::where('id_alumno',$id->id_alumnos)->where('año',$año)->first();
		if($pertenece==""){
			$alumno="";
			$pertenece = Pertenece::where('id_alumno',$id->id_alumnos)->orderByDesc('año')->first();
			$curso = Curso::where('id_curso',$pertenece->id_curso)->first();
			$asignaturas = Cuenta::where('id_curso',$curso->id_curso)->count();
			return view('notas.ver_notasalumno',compact('alumno','curso','pertenece','asignaturas','año','semestre'));
		}else{
		$curso = Curso::where('id_curso',$pertenece->id_curso)->first();

		$alumno = DB::table('alumnos')
				->join('pertenece','alumnos.id_alumnos','=','pertenece.id_alumno')
				->join('cuenta','pertenece.id_curso','=','cuenta.id_curso')
				->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
				->join('dicta','dicta.id_cuenta','cuenta.id_cuenta')
				->join('profesor','dicta.id_profesor','=','profesor.id_profesor')
				->where('alumnos.id_alumnos','=',$id->id_alumnos)
				->where('pertenece.año','=',$año)
				->where('dicta.año',$año)
				->get();
		$asignaturas = Cuenta::where('id_curso',$curso->id_curso)->count();
		return view('notas.ver_notasalumno',compact('alumno','curso','asignaturas','año','semestre'));
	}
		

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
					   ->join('pertenece','alumnos.id_alumnos','pertenece.id_alumno')
					   ->where('pertenece.id_curso','=',$request->input('id_curso'))
					   ->where('pertenece.año',date('Y'))
					   ->get();

			foreach ($alumnos as $alumno) {
			$nota = new Notas();
			$nota->id_notas = $id_asistencias;
			$nota->nota = $request->input($alumno->id_alumnos);
			$nota->descripcion = $request->input('descripcion');
			$nota->id_ponderacion = $request->input('ponderacion');
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

			return Redirect('/asistencia');
			 
	}

	public function update(Request $request, Notas $nota){
			$request->flash();
			$id_curso = $request->input('id_curso');
			$id_notas = $request->input('id_notas');
			$id_asignatura = $request->input('id_asignatura');
			$descripcion = $request->input('descripcion');

			$nota = DB::table('notas')
						->where('id_notas','=',$id_notas)
						->update(['descripcion'=> $descripcion]);

			$alumnos = DB::table('alumnos')
					   ->join('pertenece','alumnos.id_alumnos','pertenece.id_alumno')
					   ->where('pertenece.id_curso','=',$request->input('id_curso'))
					   ->where('pertenece.año',date('Y'))
					   ->get();

			foreach ($alumnos as $alumno) {
				$descripcion1 = DB::table('notas')
                                      ->select('nota')
                                      ->where('id_notas','=',$id_notas)
                                      ->where('id_alumno','=',$alumno->id_alumnos)
                                      ->get();
				if ($descripcion1 == '[]') {
					$profesor = Profesor::where('rut',auth()->user()->rut)->first();
					$nota = new Notas();
			$nota->id_notas = $id_notas;
			$nota->nota = $request->input($alumno->id_alumnos);
			$nota->descripcion = $descripcion;
			$nota->id_ponderacion = $request->input('id_ponderacion');
			if(DATE('m')>='8')
				$nota->semestre = '2';
			else
				$nota->semestre = '1';
			$nota->año = DATE('Y');
			$nota->id_alumno = $alumno->id_alumnos;
			$nota->id_curso = $id_curso;
			$nota->id_profesor = $profesor->id_profesor;
			$nota->id_asignatura = $id_asignatura;
			$nota->save();
				}else{
				$nota = DB::table('notas')
						->where('id_notas','=',$id_notas)
						->where('id_alumno','=',$alumno->id_alumnos)
						->update(['nota'=> $request->input($alumno->id_alumnos)]);
				}
			}
		return Redirect('/asistencia');
	}

	public function delete(Request $request){
	
		$nota = DB::table('notas')
						->where('id_notas','=',$request->input('id'))
						->delete();

		return Redirect('/asistencia');
		
	}
}
?>