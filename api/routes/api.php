<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

<<<<<<< HEAD
Route::resource('departamento', 'DepartamentoController')->except(['create','edit']);
Route::resource('comida', 'ComidaController')->except(['create','edit']);
Route::resource('empleado', 'EmpleadoController')->except(['create','edit']);
Route::resource('registro', 'RegistroController')->only(['store','destroy']);

Route::get('empleado/{id}/registros','RegistroController@getEmpleadoRegistros');
=======
Route::resource('departamento', 'DepartamentoController')->except(['create','edit'])->middleware('authAPI');
Route::resource('comida', 'ComidaController')->except(['create','edit'])->middleware('authAPI');
Route::resource('empleado', 'EmpleadoController')->except(['create','edit'])->middleware('authAPI');
Route::resource('registro', 'RegistroController')->only(['store','destroy'])->middleware('authAPI');

Route::get('empleado/{id}/registros','RegistroController@getEmpleadoRegistros')->middleware('authAPI');
>>>>>>> f609762dca7c96f0dc27254c9bd93dad6bc466c0
