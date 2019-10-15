<?php

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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// rutas para retornar las vistas de los items del menu
Route::get("/estudiantes",function (){
    return view("estudiantes");
});
Route::get("/docentes",function (){
    return view("docentes");
});
Route::get("/particulares",function (){
    return view("particulares");
});
Route::get("/estadisticas",function (){
    return view("estadisticas");
});

//ruta para retornar la vista del perfil
Route::get("/perfil",function (){
    return view("perfil");
});


Route::get("/imc",function (){
    return view("imc");
});

Route::get("/grasa",function (){
    return view("grasa");
});

Route::get("/ruffiel",function (){
    return view("ruffiel");
});

Route::get('estudiantes/', 'EstudiantesController@index')->name('estudiantes');
Route::get('estudiantes/crear', 'EstudiantesController@create')->name('estudiantes.formulario');
Route::post('estudiantes/guardar', 'EstudiantesController@store')->name('estudiante.guardar');

Route::delete('estudiantes/{id}/borrar','EstudiantesController@destroy')->name('estudiante.borrar');
Route::get('estudiantes/{id}/editar','EstudiantesController@edit')->name('estudiante.editar');
Route::put('estudiantes/{id}/editar','EstudiantesController@update')->name('estudiante.update');

Route::get('docentes/', 'DocentesController@index')->name('docentes');
Route::get('docentes/crear', 'DocentesController@create')->name('docentes.formulario');
Route::post('docentes/guardar', 'DocentesController@store')->name('docente.guardar');

Route::delete('docentes/{id}/borrar','DocentesController@destroy')->name('docente.borrar');
Route::get('docentes/{id}/editar','DocentesController@edit')->name('docente.editar');
Route::put('docentes/{id}/editar','DocentesController@update')->name('docente.update');

Route::get('particulares/', 'ParticularesController@index')->name('particulares');
Route::get('particulares/crear', 'ParticularesController@create')->name('particulares.formulario');
Route::post('particulares/guardar', 'ParticularesController@store')->name('particular.guardar');

Route::delete('particulares/{id}/borrar','ParticularesController@destroy')->name('particular.borrar');
Route::get('particulares/{id}/editar','ParticularesController@edit')->name('particular.editar');
Route::put('particulares/{id}/editar','ParticularesController@update')->name('particular.update');