<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use App\Curso;
use App\Pertenece;
use App\Cuenta;
use App\Dicta;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Comments;


class CursoController extends Controller
{
	public function show(){
		$cursos = Curso::all();

		return view('curso.curso_index',compact('cursos'));
	}

	public function alumnoscurso(Request $request){
		$request->flash();
		$curso = Curso::where('id_curso',$request->input('id_curso'))->first();
		$id_curso = DB::table('alumnos')
					->join('pertenece','alumnos.id_alumnos','pertenece.id_alumno')
					->where('pertenece.id_curso',$request->input('id_curso'))
					->where('pertenece.año',date('Y'))
					->get();

		return view('curso.curso_alumnos',compact('id_curso','curso'));

	}
	public function asignaturascurso(Request $request){
		$request->flash();
		$curso = Curso::where('id_curso',$request->input('id_curso'))->first();
		$cuenta = DB::table('cuenta')
				  ->join('asignatura','cuenta.id_asignatura','asignatura.id_asignatura')
				  ->where('cuenta.id_curso',$request->input('id_curso'))
				  ->get();



		return view('curso.curso_asignaturas',compact('cuenta','curso'));
	}
	public function asignar(Request $request){
		$dicta = Dicta::find($request->input('id'));
		$dicta->id_profesor = $request->input('profesor');
		$dicta->update();

		return Redirect('cursos');
	}

	public function crear(Request $request){
		$dicta = new Dicta();
		$dicta->id_profesor = $request->input('profesor');
		$dicta->id_cuenta = $request->input('cuenta');
		$dicta->año = date('Y');
		$dicta->save();

		return Redirect('cursos');
	}
}

?>