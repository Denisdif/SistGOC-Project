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
    Route::get('profile', 'UserController@editProfile');
    Route::post('update-profile', 'UserController@updateProfile');
});

//Route::resource('users', 'UserController');

Route::get('personals/{personal}/users',            'UserController@index')          ->name('personals.users.index');
Route::get('personals/{personal}/users/create',     'UserController@create')         ->name('personals.users.create');
Route::post('personals/{personal}/users',           'UserController@store')          ->name('personals.users.store');
Route::get('users/{user}',                          'UserController@show')           ->name('users.show');
Route::get('users/{user}/edit',                     'UserController@edit')           ->name('users.edit');
Route::put('users/{id}',                            'UserController@update')         ->name('users.update');
Route::delete('users/{id}',                         'UserController@destroy')        ->name('users.destroy');

//Rutas proyectos

//Route::resource('proyectos', 'ProyectoController');

Route::get('proyectos',                         'ProyectoController@index')             ->name('proyectos.index');
Route::get('proyectos/create',                  'ProyectoController@create')            ->name('proyectos.create');
Route::post('proyectos',                        'ProyectoController@store')             ->name('proyectos.store');
Route::get('proyectos/{proyecto}',              'ProyectoController@show')              ->name('proyectos.show');
Route::get('proyectos/{proyecto}/edit',         'ProyectoController@edit')              ->name('proyectos.edit');
Route::put('proyectos/{id}',                    'ProyectoController@update')            ->name('proyectos.update');
Route::delete('proyectos/{id}',                 'ProyectoController@destroy')           ->name('proyectos.destroy');
Route::get('proyectos/{proyecto}/informe',      'ProyectoController@descargarInforme')  ->name('proyectos.descargarInforme');

Route::get('proyectos/{proyecto}/autoAsignar',  'ProyectoController@autoAsignar')       ->name('proyectos.autoAsignar');
Route::get('proyectos/{proyecto}/finalizar',    'ProyectoController@finalizar')         ->name('proyectos.finalizar');

//Rutas ambientes

//Route::resource('ambientes', 'ambienteController');

Route::get('ambientes',                         'ambienteController@index')          ->name('ambientes.index');
Route::get('ambientes/create',                  'ambienteController@create')         ->name('ambientes.create');
Route::post('ambientes',                        'ambienteController@store')          ->name('ambientes.store');
Route::get('ambientes/{ambiente}',              'ambienteController@show')           ->name('ambientes.show');
Route::get('ambientes/{ambiente}/edit',         'ambienteController@edit')           ->name('ambientes.edit');
Route::put('ambientes/{id}',                    'ambienteController@update')         ->name('ambientes.update');
Route::delete('ambientes/{id}',                 'ambienteController@destroy')        ->name('ambientes.destroy');

//Rutas Ambientes de proyecto

//Route::resource('proyectos.proyectoAmbientes', 'Proyecto_ambienteController');
//Route::resource('proyectoAmbientes', 'Proyecto_ambienteController');

Route::get('proyectos/{proyecto}/proyectoAmbientes',            'Proyecto_ambienteController@index')          ->name('proyectos.proyectoAmbientes.index');
Route::get('proyectos/{proyecto}/proyectoAmbientes/create',     'Proyecto_ambienteController@create')         ->name('proyectos.proyectoAmbientes.create');
Route::post('proyectos/{proyecto}/proyectoAmbientes',           'Proyecto_ambienteController@store')          ->name('proyectos.proyectoAmbientes.store');
Route::get('proyectoAmbientes/{proyectoAmbiente}',              'Proyecto_ambienteController@show')           ->name('proyectoAmbientes.show');
Route::get('proyectoAmbientes/{proyectoAmbiente}/edit',         'Proyecto_ambienteController@edit')           ->name('proyectoAmbientes.edit');
Route::put('proyectoAmbientes/{id}',                            'Proyecto_ambienteController@update')         ->name('proyectoAmbientes.update') ;
Route::delete('proyectoAmbientes/{id}',                         'Proyecto_ambienteController@destroy')        ->name('proyectoAmbientes.destroy');

//Rutas Tareas

//Route::resource('proyectos.tareas', 'TareaController');
//Route::resource('tareas', 'TareaController');

Route::get('proyectos/{proyecto}/tareas',            'TareaController@index')          ->name('proyectos.tareas.index');
Route::get('proyectos/{proyecto}/tareas/create',     'TareaController@create')         ->name('proyectos.tareas.create');
Route::post('proyectos/{proyecto}/tareas',           'TareaController@store')          ->name('proyectos.tareas.store');
Route::get('tareas/{tarea}',                         'TareaController@show')           ->name('tareas.show');
Route::get('tareas/{tarea}/edit',                    'TareaController@edit')           ->name('tareas.edit');
Route::put('tareas/{id}',                            'TareaController@update')         ->name('tareas.update');
Route::delete('tareas/{id}',                         'TareaController@destroy')        ->name('tareas.destroy');

Route::get('tareas/{tarea}/aprobar',                 'TareaController@aprobar')        ->name('tareas.aprobar');
Route::get('tareas/{tarea}/desaprobar',              'TareaController@desaprobar')     ->name('tareas.desaprobar');
Route::get('tareas/{tarea}/autoAsignar',             'TareaController@autoAsignar')    ->name('tareas.autoAsignar');
Route::get('tareas/{tarea}/obtenerTareas',           'TareaController@obtenerTareas')  ->name('tareas.obtenerTareas');

//Rutas de asignaciones de tareas

//Route::resource('tareas.asignacionPersonalTareas', 'AsignacionPersonalTareaController');
//Route::resource('asignacionPersonalTareas', 'AsignacionPersonalTareaController');

Route::get('tareas/{tarea}/asignacionPersonalTareas',                   'AsignacionPersonalTareaController@index')          ->name('tareas.asignacionPersonalTareas.index');
Route::get('tareas/{tarea}/asignacionPersonalTareas/create',            'AsignacionPersonalTareaController@create')         ->name('tareas.asignacionPersonalTareas.create');
Route::post('tareas/{tarea}/asignacionPersonalTareas',                  'AsignacionPersonalTareaController@store')          ->name('tareas.asignacionPersonalTareas.store');
Route::get('asignacionPersonalTareas/{asignacionPersonalTarea}',        'AsignacionPersonalTareaController@show')           ->name('asignacionPersonalTareas.show');
Route::get('asignacionPersonalTareas/{asignacionPersonalTarea}/edit',   'AsignacionPersonalTareaController@edit')           ->name('asignacionPersonalTareas.edit');
Route::put('asignacionPersonalTareas/{id}',                             'AsignacionPersonalTareaController@update')         ->name('asignacionPersonalTareas.update');
Route::delete('asignacionPersonalTareas/{id}',                          'AsignacionPersonalTareaController@destroy')        ->name('asignacionPersonalTareas.destroy');

Route::get('asignacionPersonalTareas',             'AsignacionPersonalTareaController@indexPersonal')  ->name('asignacionPersonalTareas.indexPersonal');

//Rutas estado de tareas

//Route::resource('estadoTareas', 'Estado_tareaController');

Route::get('estadoTareas',                         'Estado_tareaController@index')          ->name('estadoTareas.index');
Route::get('estadoTareas/create',                  'Estado_tareaController@create')         ->name('estadoTareas.create');
Route::post('estadoTareas',                        'Estado_tareaController@store')          ->name('estadoTareas.store');
Route::get('estadoTareas/{estadoTarea}',           'Estado_tareaController@show')           ->name('estadoTareas.show');
Route::get('estadoTareas/{estadoTarea}/edit',      'Estado_tareaController@edit')           ->name('estadoTareas.edit');
Route::put('estadoTareas/{id}',                    'Estado_tareaController@update')         ->name('estadoTareas.update');
Route::delete('estadoTareas/{id}',                 'Estado_tareaController@destroy')        ->name('estadoTareas.destroy');

//Rutas tipo de tareas

//Route::resource('tipoTareas', 'Tipo_tareaController');

Route::get('tipoTareas',                         'Tipo_tareaController@index')          ->name('tipoTareas.index');
Route::get('tipoTareas/create',                  'Tipo_tareaController@create')         ->name('tipoTareas.create');
Route::post('tipoTareas',                        'Tipo_tareaController@store')          ->name('tipoTareas.store');
Route::get('tipoTareas/{tipoTarea}',             'Tipo_tareaController@show')           ->name('tipoTareas.show');
Route::get('tipoTareas/{tipoTarea}/edit',        'Tipo_tareaController@edit')           ->name('tipoTareas.edit');
Route::put('tipoTareas/{id}',                    'Tipo_tareaController@update')         ->name('tipoTareas.update');
Route::delete('tipoTareas/{id}',                 'Tipo_tareaController@destroy')        ->name('tipoTareas.destroy');


//Rutas personal

//Route::resource('personals', 'PersonalController');

Route::get('personals',                         'PersonalController@index')          ->name('personals.index');
Route::get('personals/create',                  'PersonalController@create')         ->name('personals.create');
Route::post('personals',                        'PersonalController@store')          ->name('personals.store');
Route::get('personals/{personal}',              'PersonalController@show')           ->name('personals.show');
Route::get('personals/{personal}/edit',         'PersonalController@edit')           ->name('personals.edit');
Route::put('personals/{id}',                    'PersonalController@update')         ->name('personals.update');
Route::delete('personals/{id}',                 'PersonalController@destroy')        ->name('personals.destroy');

//Rutas personal

//Route::resource('rolPersonals', 'RolPersonalController');

Route::get('rolPersonals',                         'RolPersonalController@index')          ->name('rolPersonals.index');
Route::get('rolPersonals/create',                  'RolPersonalController@create')         ->name('rolPersonals.create');
Route::post('rolPersonals',                        'RolPersonalController@store')          ->name('rolPersonals.store');
Route::get('rolPersonals/{rolPersonal}',           'RolPersonalController@show')           ->name('rolPersonals.show');
Route::get('rolPersonals/{rolPersonal}/edit',      'RolPersonalController@edit')           ->name('rolPersonals.edit');
Route::put('rolPersonals/{id}',                    'RolPersonalController@update')         ->name('rolPersonals.update');
Route::delete('rolPersonals/{id}',                 'RolPersonalController@destroy')        ->name('rolPersonals.destroy');







Route::resource('direccions', 'DireccionController');

Route::resource('sexos', 'SexoController');

Route::resource('tipoProyectos', 'Tipo_proyectoController');

//carga de provincias con ajax

Route::get('paises/{pais}', 'DireccionController@obtenerProvincias')->name('paises.obtenerProvincias');

//carga de localidades con ajax
Route::get('provincias/{provincia}', 'DireccionController@obtenerLocalidades')->name('provincias.obtenerLocalidades');

//Pais
Route::get('/paises', 'HomeController@indexPais')->name('paises.index'); //para mostrar todos los paises
//Provincia
Route::get('/provincias', 'HomeController@indexProvincia')->name('provincias.index'); //para mostrar todos las provincias
//Localidad
Route::get('/localidades', 'HomeController@indexLocalidades')->name('localidades.index'); //para mostrar todos las localidades

Route::resource('comitentes', 'ComitenteController');

//Route::resource('entregas', 'EntregaController');

Route::get('tareas/{tarea}/entregas',                   'EntregaController@index')          ->name('tareas.entregas.index');
Route::get('tareas/{tarea}/entregas/create',            'EntregaController@create')         ->name('tareas.entregas.create');
Route::post('tareas/{tarea}/entregas',                  'EntregaController@store')          ->name('tareas.entregas.store');
Route::get('entregas/{entrega}',                        'EntregaController@show')           ->name('entregas.show');
Route::get('entregas/{entrega}/edit',                   'EntregaController@edit')           ->name('entregas.edit');
Route::put('entregas/{id}',                             'EntregaController@update')         ->name('entregas.update');
Route::delete('entregas/{id}',                          'EntregaController@destroy')        ->name('entregas.destroy');

Route::resource('comentarios', 'ComentarioController');

Route::get('tareas/{tarea}/comentarios',                'ComentarioController@index')       ->name('tareas.comentarios.index');
Route::get('tareas/{tarea}/comentarios/create',         'ComentarioController@create')      ->name('tareas.comentarios.create');
Route::post('tareas/{tarea}/comentarios',               'ComentarioController@store')       ->name('tareas.comentarios.store');
Route::get('comentarios/{comentario}',                  'ComentarioController@show')        ->name('comentarios.show');
Route::get('comentarios/{comentario}/edit',             'ComentarioController@edit')        ->name('comentarios.edit');
Route::put('comentarios/{id}',                          'ComentarioController@update')      ->name('comentarios.update');
Route::delete('comentarios/{id}',                       'ComentarioController@destroy')     ->name('comentarios.destroy');


Route::resource('evaluacions', 'EvaluacionController');

Route::get('personals/{personal}/evaluacions',          'EvaluacionController@index')       ->name('personals.evaluacions.index');
Route::get('personals/{personal}/evaluacions/create',   'EvaluacionController@create')      ->name('personals.evaluacions.create');
Route::post('personals/{personal}/evaluacions',         'EvaluacionController@store')       ->name('personals.evaluacions.store');
Route::get('evaluacions/{evaluacion}',                  'EvaluacionController@show')        ->name('evaluacions.show');
Route::get('evaluacions/{evaluacion}/edit',             'EvaluacionController@edit')        ->name('evaluacions.edit');
Route::put('evaluacions/{id}',                          'EvaluacionController@update')      ->name('evaluacions.update');
Route::delete('evaluacions/{id}',                       'EvaluacionController@destroy')     ->name('evaluacions.destroy');

//------------------------------------  PDF  ------------------------------------//

Route::get('PDFconfig',                     'PDFconfigController@index')             ->name('PDFconfig.index');
Route::put('PDFconfig/update',              'PDFconfigController@update')            ->name('PDFconfig.update');

Route::get('/proyectoPDF',                  'PDFcontroller@proyectosPDF')            ->name('PDFconfig.proyectosPDF');



Route::resource('predecesoras', 'PredecesoraController');
