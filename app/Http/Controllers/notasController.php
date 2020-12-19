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
				->where('cuenta.id_profesor','=','2')
				->get();
		return view('notas.ver_notas',compact('alumno'));
	}
	public function notasasignatura(Request $request){

		$curso = $request->input('id_curso');
		$asignatura = $request->input('id_asignatura');

		$parciales = DB::table('notas')
				   ->select('descripcion','created_at','id_curso','id_asignatura','id_profesor')
                   ->distinct()
				   ->where('id_curso','=',$curso)
				   ->where('id_asignatura','=',$asignatura)
				   ->get();
		return view('notas.notas_profesor',compact('parciales'));
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
			$alumnos = DB::table('alumnos')
					   ->where('id_curso','=',$request->input('id_curso'))
					   ->get();

			foreach ($alumnos as $alumno) {
			$nota = new Notas();
			$nota->nota = $request->input($alumno->id_alumnos);
			$nota->descripcion = $request->input('descripcion');
			$nota->semestre = '2';
			$nota->año = $request->input('año');
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
					   ->where('id_curso','=',$request->input('id_curso'))
					   ->get();

			foreach ($alumnos as $alumno) {
				$buscar = ['descripcion'=>$descripcion,'id_curso'=>$id_curso,'id_asignatura'=>$id_asignatura,'id_alumno'=>$alumno->id_alumnos];
				$notas = Notas::where($buscar)->get();
				foreach ($notas as $n ) {
					$id_nota = $n->id_notas;
				}
				$nota = Notas::find($id_nota);
				$nota->nota = $request->input($alumno->id_alumnos);
				$nota->update();
			}
		return Redirect('/notas/ver');
	}
}
?>