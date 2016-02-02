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
Route::get('servicios/', 'ServicioController@index')->name("servicios");
Route::get('servicios/new', 'ServicioController@create')->name("servicios_create");
Route::post('servicios/new', 'ServicioController@store');
Route::get('servicios/{id}', 'ServicioController@show')->name("servicios_detail");
Route::get('servicios/{id}/edit', 'ServicioController@edit')->name("servicios");
Route::post('servicios/{id}/edit', 'ServicioController@update');


Route::get('conductores/', 'ConductorController@index')->name("conductores");
Route::get('conductores/new', 'ConductorController@create')->name("conductores_create");
Route::post('conductores/new', 'ConductorController@store');
Route::get('conductores/{id}', 'ConductorController@show')->name("conductores_detail");
Route::get('conductores/{id}/edit', 'ConductorController@edit')->name("conductores");
Route::post('conductores/{id}/edit', 'ConductorController@update');

