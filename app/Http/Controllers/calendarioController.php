<?php

namespace App\Http\Controllers;

use App\Calendario;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Comments;


class CalendarioController extends Controller
{
	public function index(){
		$cursos = DB::table('cuenta')
				->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
				->join('curso','cuenta.id_curso','=','curso.id_curso')
				->select('cuenta.id_curso','cuenta.id_profesor','asignatura.nombre_asignatura','cuenta.id_asignatura','curso.grado','curso.letra')
				->where('cuenta.id_profesor','=','3')
				->get();

		return view('calendario.calendario_profesor',compact('cursos'));

	}

	public function evaluacion(Request $request){
		$evaluaciones = DB::table('calendario')
						->where('id_curso','=',$request->input('id_curso'))
						->where('id_asignatura','=',$request->input('id_asignatura'))
						->where('id_profesor','=',$request->input('id_profesor'))
						->get();

		 if ($evaluaciones == '[]') {
		 	echo "que miray sapo qlo";
		 }else{
		 	return view('calendario.futuras_evaluaciones',compact('evaluaciones'));
		 }
		
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