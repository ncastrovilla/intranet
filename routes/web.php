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

Route::post('/notas','notasController@notasasignatura');

Route::get('/notas/ver', 'notasController@showa');

Route::get('/notas/ver/curso','notasController@showalumnos');

Route::get('/notas/subir','notasController@showp');

Route::post('/notas/upload','notasController@create');

Route::get('/anotaciones','anotacionesController@showa');

Route::get('/crear',function(){
	return view('profesores.profesor_create');
});
Route::get('/creara',function(){
	return view('InsertModifyDeleteBD.alumno_create');
});
Route::post('/create','profesoresController@create');

Route::get('/profesores','profesoresController@show');

Route::post('/modificar','profesoresController@modificar');

Route::post('/update','profesoresController@update');

Route::post('/eliminar','profesoresController@delete');

Route::get('/alumnos','alumnosController@show');

Route::post('/alumnos/modificar','alumnosController@modificar');

Route::post('/alumnos/eliminar','alumnosController@delete');

Route::get('/home',function(){
	return view('welcome');
});