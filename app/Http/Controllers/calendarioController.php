<?php

namespace App\Http\Controllers;

use App\Calendario;
use App\Alumnos;
use App\Profesor;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Comments;


class CalendarioController extends Controller
{
	public function index(){
		$profesor = Profesor::where('rut',auth()->user()->rut)->first();
		$cursos = DB::table('cuenta')
				->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
				->join('curso','cuenta.id_curso','=','curso.id_curso')
				->select('cuenta.id_curso','cuenta.id_profesor','asignatura.nombre_asignatura','cuenta.id_asignatura','curso.grado','curso.letra')
				->where('cuenta.id_profesor','=',$profesor->id_profesor)
				->get();

		return view('calendario.calendario_profesor',compact('cursos'));

	}

	public function indexalumnos(){
		$alumno = Alumnos::where('rut',auth()->user()->rut)->first();
		$date = date('Y-m-d');
		$fechas = DB::table('calendario')
				->join('alumnos','alumnos.id_curso','=','calendario.id_curso')
				->join('asignatura','asignatura.id_asignatura','=','calendario.id_asignatura')
				->join('profesor','profesor.id_profesor','=','calendario.id_profesor')
				->select('asignatura.nombre_asignatura','calendario.fecha_evaluacion','calendario.descripcion_evaluacion','profesor.nombres_profesor','profesor.apellido_paterno')
				->where('alumnos.id_alumnos','=',$alumno->id_alumnos)
				->wheredate('calendario.fecha_evaluacion','>=',$date)
				->orderBY('calendario.fecha_evaluacion')
				->get();

				//echo date("d-m-Y");
		return view('calendario.calendario_alumnos',compact('fechas'));
	}

	public function evaluacion(Request $request){
		$evaluaciones = DB::table('calendario')
						->where('id_curso','=',$request->input('id_curso'))
						->where('id_asignatura','=',$request->input('id_asignatura'))
						->where('id_profesor','=',$request->input('id_profesor'))
						->get();

		$curso = $request->input('id_curso');
		$asignatura = $request->input('id_asignatura');
		$profesor = $request->input('id_profesor');

		 //if ($evaluaciones == '[]') {
		 	//echo "que miray sapo qlo";
		 //}else{
		 	return view('calendario.futuras_evaluaciones',compact('evaluaciones','curso','asignatura','profesor'));
		 //}
		
	}

	public function create(Request $request){

		$calendario = new Calendario();
		$calendario->fecha_evaluacion = $request->input('fecha');
		$calendario->descripcion_evaluacion = $request->input('descripcion_evaluacion');;
		$calendario->id_curso = $request->input('id_curso');
		$calendario->id_asignatura = $request->input('id_asignatura');
		$calendario->id_profesor = $request->input('id_profesor');
		$calendario->save();

		return Redirect('/calendario');

	}

	public function update(Request $request, Calendario $calendario){

		$calendario = Calendario::find($request->input('id_calendario'));
		$calendario->fecha_evaluacion = $request->input('fecha_evaluacion');
		$calendario->descripcion_evaluacion = $request->input('descripcion_evaluacion');
		$calendario->update();

		return Redirect('/calendario');
	}

	public function delete(Request $request, Calendario $calendario){
		$calendario = Calendario::find($request->input('id_calendario'));
		$calendario->delete();

		return Redirect('/calendario');
	}
	
}
?>