<?php

namespace App\Http\Controllers;

use App\Alumnos;
use App\Curso;
use App\Notas;
use PDF;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Comments;

class PDFController extends Controller{
	
	public function alumnoregular(Request $request){
		$alumno = Alumnos::all()->where('id_alumnos',$request->input('rut'));
		foreach ($alumno as $a ) {
		$curso = Curso::all()->where('id_curso',$a->id_curso);
		}
		$pdf = PDF::loadview('certificados.certificado_alumnoregular',compact('alumno','curso'));
		return $pdf->stream('regular.pdf');
	}

	public function index(){
		$alumno = Alumnos::all()->where('id_alumnos',3);
		return view('certificados.prueba2',compact('alumno'));
	}

	public function indexnotasa(){
		$alumno = Alumnos::all()->where('id_alumnos',3);
		return view('certificados.sacar_certificadonotas_alumno',compact('alumno'));
	}

	public function notasalumno(Request $request){
		$semestre=$request->input('semestre'); 
		$alumno = Alumnos::where('id_alumnos',$request->input('id'))->first();
		$curso = Curso::where('id_curso',$alumno->id_curso)->first();
		$asignatura = DB::table('cuenta')
					  ->where('id_curso','=',$alumno->id_curso)
					  ->get();



		$pdf = PDF::loadview('certificados.certificado_notaalumno',compact('alumno','curso','asignatura','semestre'));
		return $pdf->stream();
			
	}

	public function notasasignaturas(){

	}
}

?>