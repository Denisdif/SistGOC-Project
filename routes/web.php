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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UserController');
    Route::get('profile', 'UserController@editProfile');
    Route::post('update-profile', 'UserController@updateProfile');
});

//Rutas ambientes

Route::resource('ambientes', 'ambienteController');

//Rutas proyectos

Route::resource('proyectos.proyectoAmbientes', 'Proyecto_ambienteController');

Route::resource('proyectos', 'ProyectoController');

Route::resource('proyectoAmbientes', 'Proyecto_ambienteController');

Route::resource('proyectos.tareas', 'TareaController');

Route::resource('tareas', 'TareaController');

Route::resource('tareas.asignacionPersonalTareas', 'AsignacionPersonalTareaController');

Route::resource('asignacionPersonalTareas', 'AsignacionPersonalTareaController');

//Rutas estado de tareas

Route::resource('estadoTareas', 'Estado_tareaController');

//Rutas tipo de tareas

Route::resource('tipoTareas', 'Tipo_tareaController');

//Rutas personal

Route::resource('personals', 'PersonalController');

Route::resource('rolPersonals', 'RolPersonalController');





