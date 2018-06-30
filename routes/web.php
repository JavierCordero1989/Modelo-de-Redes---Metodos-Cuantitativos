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
use Illuminate\Http\Request;

Route::get('/', function () {
  return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('nodos', 'nodosController');

Route::resource('conexiones', 'conexionesController');

Route::get('/grafo', 'grafoController@index');
Route::get('/guardar', 'grafoController@save');

Route::post('nodo_nuevo',function(Request $request){   
  $nodo = App\Producto\nodos::create($request->input());
  return response()->json($nodo);
});

Route::resource('proyectos', 'proyectosController');