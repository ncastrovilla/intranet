<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Htpp\Request;
use App\Notas;
use DB;
use App\Comments;


class NotasController extends Controller
{
	public function showa(){
		$alumno = DB::table('alumnos')
		->where('id','=','3')
		->get();
		return view('notas.ver_notas',compact('alumno'));
	}
	public function showp(){
		return view('notas.subir_notas');
	}
}
?>