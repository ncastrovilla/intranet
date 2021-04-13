<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use App\Documentos;
use App\Profesor;
use App\Dicta;
use App\Cuenta;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use App\Comments;


class FileController extends Controller
{
	public function download($file){
		$ruta = auth()->user()->rut;
		$ruta = str_replace('-','', $ruta);
		$ruta = str_replace('.','', $ruta);

		$documento = Documentos::where('file',$file)->first();

		$pathtoFile= public_path()."/documentos/$ruta/$file";

		return response()->download($pathtoFile,$documento->nombre);
	}
	public function prueba($id_curso){

		$profesor = Documentos::where('id_curso',$id_curso)->first();

		return view('asistencia_prueba',compact('profesor'));
	}

	public function store(Request $request){

		$documento = new Documentos; 

		if ($request->file('file')) {
			$ruta = auth()->user()->rut;
			$ruta = str_replace('-','', $ruta);
			$ruta = str_replace('.','', $ruta);
			$file = $request->file('file');
			$nombre = $file->getClientOriginalName();
			$filename = time().'.'.$file->getClientOriginalName();
			$request->file->move(public_path().'/documentos/'.$ruta, $filename);
			$documento->nombre = $nombre;
			$documento->file = $filename;
		}

		$documento->titulo_documento = $request->input('titulo');
		$documento->descripcion_documento = $request->input('descripcion');

		$documento->id_curso = $request->input('id_curso');
		$documento->id_profesor = $request->input('id_profesor');
		$documento->id_asignatura = $request->input('id_asignatura');
		$documento->tipo_documento = $request->input('tipo');
		if(date('m')<3){
			$documento->año = date('Y')-1;
			$documento->semestre = 2;	
		}else{
			if(date('m')<=8){
				$documento->año = date('Y');
				$documento->semestre = 1;
			}else{
				$documento->año = date('Y');
				$documento->semestre = 2;
			}
		}
		
		$documento->save();

		return Redirect('/material');
	}

	public function update(Request $request){

		$documento = Documentos::find($request->input('id')); 

		if ($request->file('file')) {
			$ruta = auth()->user()->rut;
			$ruta = str_replace('-','', $ruta);
			$ruta = str_replace('.','', $ruta);
			$file = $request->file('file');
			$nombre = $file->getClientOriginalName();
			$filename = time().'.'.$file->getClientOriginalName();
			$request->file->move(public_path().'/documentos/'.$ruta, $filename);
			$documento->nombre = $nombre;
			$documento->file = $filename;
		}

		$documento->titulo_documento = $request->input('titulo');
		$documento->descripcion_documento = $request->input('descripcion');

		$documento->id_curso = $request->input('id_curso');
		$documento->id_profesor = $request->input('id_profesor');
		$documento->id_asignatura = $request->input('id_asignatura');
		$documento->tipo_documento = $request->input('tipo');
		if(date('m')<3){
			$documento->año = date('Y')-1;
			$documento->semestre = 2;	
		}else{
			if(date('m')<=8){
				$documento->año = date('Y');
				$documento->semestre = 1;
			}else{
				$documento->año = date('Y');
				$documento->semestre = 2;
			}
		}
		
		$documento->update();

		return Redirect('/material');
	}

	public function delete(Request $request){
			$documento = Documentos::find($request->input('id'));

			$documento->delete();

			return Redirect('/material');
	}

	public function profesor(){
		$profesor = Profesor::where('rut',auth()->user()->rut)->first();

		$alumno = DB::table('cuenta')
				->join('dicta','cuenta.id_cuenta','dicta.id_cuenta')
				->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
				->join('curso','cuenta.id_curso','=','curso.id_curso')
				->select('cuenta.id_curso','dicta.id_profesor','asignatura.nombre_asignatura','cuenta.id_asignatura','curso.grado','curso.letra')
				->where('dicta.id_profesor','=',$profesor->id_profesor)
				->where('dicta.año',date('Y'))
				->get();
		return view('documentos.profesor_index',compact('alumno'));
	}

	public function showprofesor(Request $request){
		$id_curso = $request->input('id_curso');
		$id_asignatura = $request->input('id_asignatura');
		$profesor = Profesor::where('rut',auth()->user()->rut)->first();

		if(date('m')<3){
      $año = date('Y')-1;
      $semestre = 2;
    }else{
      if(date('m')<=8){
        $año = date('Y');
        $semestre = 1;
      }else{    
        $año = date('Y');
        $semestre = 2;
      }
    }


		$documentos = DB::table('documentos')
					 ->where('id_profesor',$profesor->id_profesor)
					 ->where('id_curso',$id_curso)
					 ->where('id_asignatura',$id_asignatura)
					 ->where('tipo_documento','Guia')
					 ->where('semestre',$semestre)
					 ->where('año',$año)
					 ->get();

		$evaluacion = DB::table('documentos')
					 ->where('id_profesor',$profesor->id_profesor)
					 ->where('id_curso',$id_curso)
					 ->where('id_asignatura',$id_asignatura)
					 ->where('tipo_documento','Evaluacion')
					 ->where('semestre',$semestre)
					 ->where('año',$año)
					 ->get();
		$otro = DB::table('documentos')
					 ->where('id_profesor',$profesor->id_profesor)
					 ->where('id_curso',$id_curso)
					 ->where('id_asignatura',$id_asignatura)
					 ->where('tipo_documento','Otro')
					 ->where('semestre',$semestre)
					 ->where('año',$año)
					 ->get();

		return view('documentos.documentos_profesor',compact('documentos','evaluacion','id_curso','id_asignatura','profesor','otro'));
	}

	public function showalumnos(Request $request){
		$id_curso = $request->input('id_curso');
		$id_asignatura = $request->input('id_asignatura');
		$cuenta = Cuenta::where('id_curso',$id_curso)->where('id_asignatura',$id_asignatura)->first();

		$dicta = Dicta::where('id_cuenta',$cuenta->id_cuenta)->where('año',date('Y'))->first();	

		$profesor = Profesor::where('id_profesor',$dicta->id_profesor)->first();

		if(date('m')<3){
      $año = date('Y')-1;
      $semestre = 2;
    }else{
      if(date('m')<=8){
        $año = date('Y');
        $semestre = 1;
      }else{    
        $año = date('Y');
        $semestre = 2;
      }
    }


		$documentos = DB::table('documentos')
					 ->where('id_curso',$id_curso)
					 ->where('id_asignatura',$id_asignatura)
					 ->where('tipo_documento','Guia')
					 ->where('semestre',$semestre)
					 ->where('año',$año)
					 ->get();

		$evaluacion = DB::table('documentos')
					 ->where('id_curso',$id_curso)
					 ->where('id_asignatura',$id_asignatura)
					 ->where('tipo_documento','Evaluacion')
					 ->where('semestre',$semestre)
					 ->where('año',$año)
					 ->get();

		return view('documentos.documentos_alumnos',compact('documentos','evaluacion','id_curso','id_asignatura','profesor'));
		
	}

	public function downloadalumnos(Request $request){
		$profesor = Profesor::where('id_profesor',$request->input('id_profesor'))->first();

		$id_file = $request->input('id_file');

		$ruta = $profesor->rut;
		$ruta = str_replace('-','', $ruta);
		$ruta = str_replace('.','', $ruta);

		$documento = Documentos::where('id_documentos',$id_file)->first();

		$file = $documento->file;

		$pathtoFile= public_path()."/documentos/$ruta/$file";

		return response()->download($pathtoFile,$documento->nombre);
	}
}

?>