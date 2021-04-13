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


 

Route::group(["middleware" => "profesor"],function(){
Route::post('/notas','notasController@notasasignatura');
Route::get('/notas','notasController@notasasignatura');
Route::get('/notas/ver', 'notasController@showa');
Route::get('/notas/subir','notasController@showp');
Route::post('/notas/upload','notasController@create');
Route::post('/nota/delete','notasController@delete');

Route::post('/ponderacion/create','notasController@ponderacioncreate');
Route::post('/ponderacion/editar','notasController@ponderacioneditar');

Route::post('/notas/update','notasController@update');
Route::get('/calendario','calendarioController@index');
Route::get('/calendario/listar','calendarioController@listar');
Route::post('/calendario/curso','calendarioController@evaluacion');
Route::post('calendario/create','calendarioController@create');
Route::post('/calendario/update','calendarioController@update'); //profe

Route::post('/calendario/delete','calendarioController@delete');
Route::get('/asistencia','asistenciaController@indexprofesor');
Route::post('/asistencia','asistenciaController@indexprofesorold');
Route::get('/asistencia/curso','asistenciaController@asistenciaasignatura');
Route::post('/asistencia/curso','asistenciaController@asistenciaasignatura'); //profe

Route::post('/asistencia/create','asistenciaController@create'); //profe

Route::post('/asistencia/update','asistenciaController@update');
Route::post('/certificado/notas/curso','pdfController@notasasignaturas');

Route::get('/material','fileController@profesor');
Route::post('/material/curso','fileController@showprofesor');

Route::post('/material/upload','materialController@upload');
Route::post('/material/delete','fileController@delete');

Route::get('/curso','profesoresController@curso');

});

Route::get('/administrativos','administrativosController@show');
Route::post('/administrativos/create','administrativosController@create');
Route::post('/administrativos/update','administrativosController@update');
Route::post('/administrativos/delete','administrativosController@delete');

Route::get('/administradores','administradoresController@show');
Route::post('/administradores/create','administradoresController@create');
Route::post('/administradores/update','administradoresController@update');
Route::post('/administradores/delete','administradoresController@delete');

Route::group(['middleware' => "alumno"],function(){
Route::get('/notas/alumno','notasController@showalumnos');
Route::post('/notas/alumno','notasController@showalumnosold');
Route::get('/calendario/alumnos','calendarioController@indexalumnos');
Route::get('/calendario/alumnos/listar','calendarioController@listaralumnos');
Route::get('/asistencia/alumno','asistenciaController@indexalumno');
Route::get('/certificado/alumnoregular','pdfController@index'); //alumno

Route::get('/certificado/notas','pdfController@indexnotasa'); //alumno

Route::post('/certificado','pdfController@alumnoregular'); //alumno

Route::post('/certificado/notas/alumno','pdfController@notasalumno');

Route::post('/material/alumnos','fileController@showalumnos');

Route::post('/material/alumnos/download','fileController@downloadalumnos');
});

 //profe
  
 //profe

 //alumno

Route::get('/','noticiasController@show')->middleware('auth');

Route::group(['middleware' => "admin"],function(){

Route::post('/administrador/contraseña','administradoresController@contraseña');

Route::post('/noticia/create','noticiasController@create');
Route::post('/noticia/update','noticiasController@update');
Route::post('/noticia/delete','noticiasController@delete');

	Route::post('/create','profesoresController@create'); //admin

Route::get('/cursos','cursoController@show');
Route::post('/cursos/alumnos','cursoController@alumnoscurso');
Route::post('/cursos/asignaturas','cursoController@asignaturascurso');
Route::post('/cursos/asignaturas/asignar','cursoController@crear');

Route::post('/cursos/asignaturas/modificar','cursoController@asignar');


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

Route::get('/administrativos','administrativosController@show');
Route::post('/administrativos/create','administrativosController@create');
Route::post('/administrativos/update','administrativosController@update');
Route::post('/administrativos/delete','administrativosController@delete');

Route::get('/administradores','administradoresController@show');
Route::post('/administradores/create','administradoresController@create');
Route::post('/administradores/update','administradoresController@update');
Route::post('/administradores/delete','administradoresController@delete');

});


Route::get('/anotaciones','anotacionesController@index');

Auth::routes();

Route::get('/prueba',function(){
	return view('prueba');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::post('file/upload','fileController@store');
Route::get('file/download/{file}','fileController@download');
Route::get('/prueba/{id_curso}','fileController@prueba');
