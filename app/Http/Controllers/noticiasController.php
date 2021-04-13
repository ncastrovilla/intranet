<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Noticias;
use App\Curso;
use App\Alumnos;
use App\Profesor;
use App\Cuenta;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Comments;


class NoticiasController extends Controller
{
	public function show(){
		$noticias = Noticias::paginate('6');
		return view('noticias.noticias_index',compact('noticias'));
	}
	public function create(Request $request){
		$e=0;
		$noticia = new Noticias();
		$noticia->titulo_noticia = $request->input('titulo');
		$noticia->descripcion_noticia = $request->input('descripcion');
		if($request->file('file')){
			$e=1;
			$file = $request->file('file');
			$filename = time().'.'.$file->getClientOriginalName();
			$request->file->move(public_path().'/Noticias', $filename);
			$noticia->imagen = $filename;
		}
		$noticia->fecha_noticia = date('Y-m-d');

		$noticia->save();

		return Redirect('/');
			 
	}

	public function update(Request $request){
		
		$noticia = Noticias::find($request->input('id'));
		$noticia->titulo_noticia = $request->input('titulo');
		$noticia->descripcion_noticia = $request->input('descripcion');
		$noticia->cuerpo_noticia = $request->input('cuerpo');
		if($request->file('file')){
			$file = $request->file('file');
			$filename = time().'.'.$file->getClientOriginalName();
			$request->file->move(public_path().'/Noticias', $filename);
			$noticia->imagen = $filename;
		}

		$noticia->update();
		
		return Redirect('/');
	}

	public function delete(Request $request){
		$noticia = Noticias::find($request->input('id'));
		$noticia->delete();

		return Redirect('/');
	}
}
?>