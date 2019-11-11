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
Route::get("/pagose",function (){
    return view("pagosestudiantes");
});
Route::get("/pagosp",function (){
    return view("pagosparticulares");
});

//ruta para retornar la vista del perfil
Route::get("/perfil",function (){
    return view("perfil");
});


//Route::get("/imc",function (){
  //  return view("imc");
//});

Route::get("/verestadistica",function (){
    return view("verestadistica");
});

Route::get("/grasa",function (){
    //return view("grasa");
});

Route::get("/ruffiel",function (){
    return view("ruffiel");
});
Route::get("/botonimc",function (){
    return view("botonimc");
});
Route::get("/botongrasa",function (){
    return view("botongrasa");
});
Route::get("/botonruffier",function (){
    return view("botonruffier");
});


Route::get('estudiantes/', 'EstudiantesController@index')->name('estudiantes');
Route::get('estudiantes/crear', 'EstudiantesController@create')->name('estudiantes.formulario');
Route::post('estudiantes/guardar', 'EstudiantesController@store')->name('estudiante.guardar');

Route::delete('estudiantes/{id}/borrar','EstudiantesController@destroy')->name('estudiante.borrar');
Route::get('estudiantes/{id}/editar','EstudiantesController@edit')->name('estudiante.editar');
Route::put('estudiantes/editar','EstudiantesController@update')->name('estudiante.update');

Route::get('docentes/', 'DocentesController@index')->name('docentes');
Route::get('docentes/crear', 'DocentesController@create')->name('docentes.formulario');
Route::post('docentes/guardar', 'DocentesController@store')->name('docente.guardar');

Route::delete('docentes/{id}/borrar','DocentesController@destroy')->name('docente.borrar');
Route::get('docentes/{id}/editar','DocentesController@edit')->name('docente.editar');
Route::put('docentes/editar','DocentesController@update')->name('docente.update');

Route::get('particulares/', 'ParticularesController@index')->name('particulares');
Route::get('particulares/crear', 'ParticularesController@create')->name('particulares.formulario');
Route::post('particulares/guardar', 'ParticularesController@store')->name('particular.guardar');

Route::delete('particulares/{id}/borrar','ParticularesController@destroy')->name('particular.borrar');
Route::get('particulares/{id}/editar','ParticularesController@edit')->name('particular.editar');
Route::put('particulares/editar','ParticularesController@update')->name('particular.update');

Route::get('ruffiel/', 'RuffierController@index')->name('ruffiel');
Route::get('ruffiel/crear', 'RuffierController@create')->name('ruffiel');
Route::post('ruffiel/guardar', 'RuffierController@store')->name('ruffier.guardar');

Route::delete('ruffiel/{id}/borrar','RuffierController@destroy')->name('ruffier.borrar');
Route::get('ruffiel/{id}/editar','RuffierController@edit')->name('ruffier.editar');
Route::put('riffiel/{id}/edit','RuffierController@update')->name('ruffier.update');

Route::get("buscar","EstudiantesController@buscarEstudiante")->name("estudiante.buscar");

Route::get('pagosestudiantes/', 'PagoEstudianteController@index')->name('pagoestudiantes');
Route::get('pagosestudiantes/crear', 'PagoEstudianteController@create')->name('pagoestudiantes.formulario');
Route::post('pagosestudiantes/guardar', 'PagoEstudianteController@store')->name('pagoestudiantes.guardar');


Route::get("buscarPart","ParticularesController@buscarParticular")->name("particular.buscarPart");
Route::get("buscarCliente","EstadisticasController@buscarCliente")->name("cliente.buscarCliente");
Route::get("buscarDoc","DocentesController@buscarDocente")->name("docente.buscarDoc");

Route::get('pagosestudiantes/', 'PagoEstudianteController@index')->name('pagoestudiantes');
Route::get('pagosestudiantes/crear', 'PagoEstudianteController@create')->name('pagoestudiantes.formulario');
Route::post('pagosestudiantes/guardar', 'PagoEstudianteController@store')->name('pagoestudiantes.guardar');
Route::delete('pagosestudiantes/{id}/borrar','PagoEstudianteController@destroy')->name('pagoestudiante.borrar');

Route::get('pagosparticulares/', 'PagoParticularController@index')->name('pagoparticulares');
Route::get('pagosparticulares/crear', 'PagoParticularController@create')->name('pagoparticulares.formulario');
Route::post('pagosparticulares/guardar', 'PagoParticularController@store')->name('pagoparticulares.guardar');

Route::get('estadisticas/', 'EstadisticasController@index')->name('estadisticas');
Route::get('estadisticas/crear', 'EstadisticasController@create')->name('estadisticas');

Route::get('grasa/{id}', 'GrasaController@index')->name('grasa.uni');
Route::get('grasa/nuevo/{id}', 'GrasaController@Create')->name('botongrasa');
Route::post('grasa/crear', 'GrasaController@store')->name('grasa.guardar');

Route::delete('grasa/{id}/borrar','GrasaController@destroy')->name('grasa.borrar');
Route::get('grasa/{id}/{cliente}/editar','GrasaController@edit')->name('grasa.editar');
Route::put('grasa/{id}/edit','GrasaController@update')->name('grasa.update');

Route::get('imc/{id}','ImcController@index')->name('imc.ini');
Route::get('imc/nuevo/{id}','ImcController@create')->name('botonimc');
Route::post('imc/crear','ImcController@store')->name('imc.guardar');

Route::delete('imc/{id}/borrar','ImcController@destroy')->name('imc.borrar');

Route::get('imc/{id}/{cliente}/editar','ImcController@edit')->name('imc.editar');
Route::put('imc/{id}/edit','ImcController@update')->name('imc.update');
//Route::get('imc/{id}/mostrar','ImcController@mostrarIMCCliente')->name('botomostrar');

//ruta para crear un nuevo usuario
Route::post('nuevousuario/', 'AuthController@crear_usuario')->name('nuevo.usuario');




