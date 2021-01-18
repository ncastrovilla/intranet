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
    return view('layouts.plantilla');
})->middleware('auth');

Route::group(["middleware" => "profesor"],function(){
	Route::post('/notas','notasController@notasasignatura');
Route::get('/notas/ver', 'notasController@showa');
Route::get('/notas/subir','notasController@showp');
Route::post('/notas/upload','notasController@create');

Route::post('/notas/update','notasController@update');
Route::get('/calendario','calendarioController@index');
Route::post('/calendario/curso','calendarioController@evaluacion');
Route::post('calendario/create','calendarioController@create');
Route::post('/calendario/update','calendarioController@update'); //profe

Route::post('/calendario/delete','calendarioController@delete');
Route::get('/asistencia','asistenciaController@indexprofesor');
Route::post('/asistencia/curso','asistenciaController@asistenciaasignatura'); //profe

Route::post('/asistencia/create','asistenciaController@create'); //profe

Route::post('/asistencia/update','asistenciaController@update');
Route::post('/certificado/notas/curso','pdfController@notasasignaturas');
});

Route::group(['middleware' => "alumno"],function(){
	Route::get('/notas/alumno','notasController@showalumnos')->middleware('alumno');
Route::get('/calendario/alumnos','calendarioController@indexalumnos');
Route::get('/asistencia/alumno','asistenciaController@indexalumno');
Route::get('/certificado/alumnoregular','pdfController@index'); //alumno

Route::get('/certificado/notas','pdfController@indexnotasa'); //alumno

Route::post('/certificado','pdfController@alumnoregular'); //alumno

Route::post('/certificado/notas/alumno','pdfController@notasalumno');
});

 //profe
  
 //profe

 //alumno


Route::group(['middleware' => "admin"],function(){
	Route::post('/create','profesoresController@create'); //admin

Route::get('/profesores','profesoresController@show'); //admin

Route::get('/profesores/users','profesoresController@createuser');

Route::post('/profesor/asignarasig','profesoresController@asignarasignaturas'); //admin

Route::post('/modificar','profesoresController@modificar'); //admin

Route::post('/update','profesoresController@update'); //admin

Route::post('/eliminar','profesoresController@delete'); //admin

Route::get('/alumnos','alumnosController@show'); //admin

Route::post('/alumnos/create','alumnosController@create'); //admin

Route::post('/alumnos/update','alumnosController@update'); //admin

Route::post('/alumnos/delete','alumnosController@delete');
});


Route::get('/anotaciones','anotacionesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/prueba', function(){
	return view("prueba");
});
