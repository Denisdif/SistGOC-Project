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

Route::resource('ambientes', 'ambienteController');

Route::resource('proyectos', 'ProyectoController');

Route::resource('proyectos.proyectoAmbientes', 'Proyecto_ambienteController');

Route::resource('proyectoAmbientes', 'Proyecto_ambienteController');

Route::resource('estadoTareas', 'Estado_tareaController');

Route::resource('tipoTareas', 'Tipo_tareaController');

Route::resource('proyectos.tareas', 'TareaController');

Route::resource('tareas', 'TareaController');

Route::resource('rolPersonals', 'RolPersonalController');


Route::resource('personals', 'PersonalController');