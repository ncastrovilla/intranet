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

Route::post('/notas/update','notasController@update');

Route::get('/anotaciones','anotacionesController@index');

Route::get('/calendario','calendarioController@index');

Route::post('/calendario/curso','calendarioController@evaluacion');

Route::post('calendario/create','calendarioController@create');

Route::post('/calendario/update','calendarioController@update');

Route::post('/calendario/delete','calendarioController@delete');

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