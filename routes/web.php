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

Route::get('/', function () {
  return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('nodos', 'nodosController');

Route::resource('conexiones', 'conexionesController');

Route::get('/grafo', 'grafoController@index');
Route::get('/guardar', 'grafoController@save');

Route::resource('proyectos', 'proyectosController');