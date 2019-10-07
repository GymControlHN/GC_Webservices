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
