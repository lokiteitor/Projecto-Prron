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

Route::resource('departamento', 'DepartamentoController')->except(['create','edit'])->middleware('authAPI');
Route::resource('comida', 'ComidaController')->except(['create','edit'])->middleware('authAPI');
Route::resource('empleado', 'EmpleadoController')->except(['create','edit'])->middleware('authAPI');
Route::resource('registro', 'RegistroController')->only(['store','destroy'])->middleware('authAPI');

Route::get('empleado/{id}/registros','RegistroController@getEmpleadoRegistros')->middleware('authAPI');