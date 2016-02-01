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

Route::get('/', function () {
    return view('welcome');
});
Route::get('servicios/', 'ServicioController@index');
Route::get('servicios/{ticket_id}', 'ServicioController@show');
Route::get('servicios/{ticket_id}/edit', 'ServicioController@edit');
Route::post('servicios/{ticket_id}/edit', 'ServicioController@update');
Route::get('servicios/create', 'ServicioController@create');
Route::post('servicios/create', 'ServicioController@store');
