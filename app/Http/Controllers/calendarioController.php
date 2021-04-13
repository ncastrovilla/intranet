<?php

namespace App\Http\Controllers;

use App\Calendario;
use App\Alumnos;
use App\Curso;
use App\Cuenta;
use App\Asignatura;
use App\Pertenece;
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
				->join('dicta','cuenta.id_cuenta','dicta.id_cuenta')
				->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
				->join('curso','cuenta.id_curso','=','curso.id_curso')
				->select('cuenta.id_curso','dicta.id_profesor','asignatura.nombre_asignatura','cuenta.id_asignatura','curso.grado','curso.letra')
				->where('dicta.id_profesor','=',$profesor->id_profesor)
				->where('dicta.año',date('Y'))
				->get();

		return view('calendario.calendario_profesor',compact('cursos','profesor'));

	}

	public function indexalumnos(){
		$alumno = Alumnos::where('rut',auth()->user()->rut)->first();
		$pertenece = Pertenece::where('id_alumno',$alumno->id_alumnos)->where('año',date('Y'))->first();
		$date = date('Y-m-d');
		$fechas = DB::table('calendario')
				->join('pertenece','pertenece.id_curso','=','calendario.id_curso')
				->join('asignatura','asignatura.id_asignatura','=','calendario.id_asignatura')
				->join('profesor','profesor.id_profesor','=','calendario.id_profesor')
				->select('asignatura.nombre_asignatura','calendario.fecha_evaluacion','calendario.descripcion_evaluacion','profesor.nombres_profesor','profesor.apellido_paterno')
				->where('pertenece.id_alumno','=',$alumno->id_alumnos)
				->where('pertenece.año','=',date('Y'))
				->wheredate('calendario.fecha_evaluacion','>=',$date)
				->orderBY('calendario.fecha_evaluacion')
				->get();

				//echo date("d-m-Y");
		return view('calendario.calendario_alumnos',compact('fechas'));
	}

	public function listaralumnos(){
		$alumno = Alumnos::where('rut',auth()->user()->rut)->first();
		$pertenece = Pertenece::where('id_alumno',$alumno->id_alumnos)->where('año',date('Y'))->first();
		$date = date('Y-m-d');
		$nueva_agenda= [];
		$fechas = DB::table('calendario')
				->join('pertenece','pertenece.id_curso','=','calendario.id_curso')
				->join('asignatura','asignatura.id_asignatura','=','calendario.id_asignatura')
				->join('profesor','profesor.id_profesor','=','calendario.id_profesor')
				->select('asignatura.nombre_asignatura','calendario.fecha_evaluacion','calendario.descripcion_evaluacion','profesor.nombres_profesor','profesor.apellido_paterno')
				->where('pertenece.id_alumno','=',$alumno->id_alumnos)
				->where('pertenece.año','=',date('Y'))
				->wheredate('calendario.fecha_evaluacion','>=',$date)
				->orderBY('calendario.fecha_evaluacion')
				->get();

		foreach ($fechas as $f) {
			$curso = Curso::where('id_curso',$agenda->id_curso)->first();
			$asignatura = Asignatura::where('id_asignatura',$agenda->id_asignatura)->first();
			$nueva_agenda []= [
				"id" => $agenda->id_calendario,
				"title" => $agenda->descripcion_evaluacion,
				"start" => $agenda->fecha_evaluacion,
				"end" => $agenda->fecha_evaluacion,
				"backgroundColor" => "#1f7904",
				"textColor" => "#fff",
				"extendedProps"=>[
					"id_curso" => $agenda->id_curso,
					"curso" => $curso->grado.' '.$curso->letra,
					"asignatura" => $asignatura->nombre_asignatura,
					"id_asignatura" => $agenda->id_asignatura
				]	
			];
		}
	}

	public function listar(){

		$profesor = Profesor::where('rut',auth()->user()->rut)->first();

		$calendario = Calendario::where('id_profesor',$profesor->id_profesor)->get();


		$nueva_agenda= [];

		foreach ($calendario as $agenda) {
			$curso = Curso::where('id_curso',$agenda->id_curso)->first();
			$asignatura = Asignatura::where('id_asignatura',$agenda->id_asignatura)->first();
			$nueva_agenda []= [
				"id" => $agenda->id_calendario,
				"title" => $agenda->descripcion_evaluacion,
				"start" => $agenda->fecha_evaluacion,
				"end" => $agenda->fecha_evaluacion,
				"backgroundColor" => "#1f7904",
				"textColor" => "#fff",
				"extendedProps"=>[
					"id_curso" => $agenda->id_curso,
					"curso" => $curso->grado.' '.$curso->letra,
					"asignatura" => $asignatura->nombre_asignatura,
					"id_asignatura" => $agenda->id_asignatura
				]	
			];
		}
		return response()->json($nueva_agenda);
	}

	public function evaluacion(Request $request){
		$evaluaciones = DB::table('calendario')
						->where('id_profesor','=',$request->input('id_profesor'))
						->wheredate('fecha_evaluacion','>=',date('Y-m-d'))
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

		$cuenta = Cuenta::where('id_cuenta',$request->input('cuenta'))->first();
		$profesor = Profesor::where('rut',auth()->user()->rut)->first();

		$calendario = new Calendario();
		$calendario->fecha_evaluacion = $request->input('fecha');
		$calendario->descripcion_evaluacion = $request->input('descripcion_evaluacion');;
		$calendario->id_curso = $cuenta->id_curso;
		$calendario->id_asignatura = $cuenta->id_asignatura;
		$calendario->id_profesor = $profesor->id_profesor;
		$calendario->save();

		return Redirect('/calendario');

	}

	public function update(Request $request, Calendario $calendario){

		$calendario = Calendario::find($request->input('id_calendario'));
		$calendario->fecha_evaluacion = $request->input('fecha_evaluacion');
		$calendario->descripcion_evaluacion = $request->input('descripcion_evaluacion');
		if($request->input('curso') !=0){
			$cuenta = Cuenta::where('id_cuenta',$request->input('curso'))->first();
			$calendario->id_curso = $cuenta->id_curso;
			$calendario->id_asignatura = $cuenta->id_asignatura;
		}
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