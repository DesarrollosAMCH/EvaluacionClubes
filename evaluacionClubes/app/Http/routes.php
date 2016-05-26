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

Route::get('/', 'LoginController@login');
Route::get('/admin', 'Admin\DashboardController@index');



/**
 * Evaluaciones routes
 */
Route::get('/admin/evaluaciones', 'Admin\EvaluacionController@listar');
Route::get('/admin/evaluaciones/nueva', 'Admin\EvaluacionController@nueva');
Route::post('/admin/evaluaciones/crear-temorada', 'Admin\EvaluacionController@saveTemporada');

/**
 * Clubes routes
 */
Route::get('/admin/clubes', 'Admin\ClubesController@listar');