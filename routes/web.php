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

Route::get('/calendario/alumnos','calendarioController@indexalumnos');

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

Route::post('/alumnos/create','alumnosController@create');

Route::post('/alumnos/update','alumnosController@update');

Route::post('/alumnos/delete','alumnosController@delete');

Route::get('/asistencia','asistenciaController@indexprofesor');

Route::get('/asistencia/alumno','asistenciaController@indexalumno');

Route::post('/asistencia/curso','asistenciaController@asistenciaasignatura');

Route::post('/asistencia/create','asistenciaController@create');

Route::post('/asistencia/update','asistenciaController@update');

Route::get('/pdf',function(){
	return view('prueba');
});

Route::get('/pdfnotas','pdfController@index');

Route::post('/certificado','pdfController@alumnoregular');

Route::get('/certificado/notas','pdfController@notasalumno');