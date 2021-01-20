<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Material;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Comments;


class MaterialController extends Controller
{
	public function upload(Request $request){
		$curso = $request->input('id_curso');
		$asignatura = $request->input('id_asignatura');

		$material = new Material();
		$material->titulo = $request->input('titulo');
		$material->tipo = $request->input('tipo');
		$material->documento = $request->input('documento');
		$material->id_curso = $curso;
		$material->id_asignatura = $asignatura;
		$material->año = 2020;
		$material->semestre = 2;
		$material->save();


		return Redirect('/material');
	}

}
?>