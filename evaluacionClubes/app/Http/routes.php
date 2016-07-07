<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@home');
Route::get('/login', 'LoginController@login');
Route::post('/login', 'LoginController@doLogin');
Route::get('/logout', 'LoginController@logout');
Route::get('/register', 'LoginController@registerForm');
Route::post('/register', 'LoginController@register');
Route::get('/activate/{token}/{club}/{email}', 'LoginController@activate');
Route::get('/mailing', 'LoginController@mailing');
Route::get('/admin', 'Admin\DashboardController@index');



/**
 * Evaluaciones routes
 */
Route::get('/admin/evaluaciones', 'Admin\EvaluacionController@listar');
Route::get('/admin/evaluaciones/nueva', 'Admin\EvaluacionController@nueva');
Route::get('/admin/evaluaciones/editar/{id}', 'Admin\EvaluacionController@editar');
Route::post('/admin/evaluaciones/guardar-temorada/', 'Admin\EvaluacionController@saveTemporada');
Route::post('/admin/evaluaciones/guardar-temorada/{id}', 'Admin\EvaluacionController@saveTemporada');

Route::post('/admin/evaluaciones/guardar-requisito', 'Admin\EvaluacionController@saveRequisito');
Route::post('/admin/evaluaciones/guardar-requisito/{id}', 'Admin\EvaluacionController@saveRequisito');
Route::post('/admin/evaluaciones/upload/{id}', 'Admin\EvaluacionController@upload');



Route::get('/app', 'App\EvaluacionController@listar');
Route::get('/app/requisitos/{id_evaluacion}', 'App\EvaluacionController@requisitos');
Route::get('/app/requisito/{id_requisito}', 'App\EvaluacionController@requisito');
Route::post('/app/requisito/guardar-requisito/{id_requisito}', 'App\EvaluacionController@guardarRequisito');

/**
 * Clubes routes
 */
Route::get('/admin/clubes', 'Admin\ClubesController@listar');