<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Htpp\Request;
use App\Notas;
use DB;
use App\Comments;


class AnotacionesController extends Controller
{
	public function showa(){
		return view('anotaciones.ver_anotaciones');
	}
	
}
?>