<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.index');
});

Route::get('/notas/ver', 'notasController@showa');
Route::get('/notas/subir','notasController@showp');

Route::get('/anotaciones','anotacionesController@showa');

Route::get('/crear',function(){
	return view('InsertModifyDeleteBD.profesor_create');
});
Route::get('/creara',function(){
	return view('InsertModifyDeleteBD.alumno_create');
});
Route::post('/crear','IDMController@createp');