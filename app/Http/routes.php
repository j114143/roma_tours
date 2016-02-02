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
Route::get('servicios/new', 'ServicioController@create')->name("servicios_new");
Route::post('servicios/new', 'ServicioController@store');
Route::get('servicios/{id}', 'ServicioController@show')->name("servicios_detail");
Route::get('servicios/{id}/edit', 'ServicioController@edit')->name("servicios_edit");
Route::post('servicios/{id}/edit', 'ServicioController@update');

Route::get('conductores/', 'ConductorController@index');
Route::get('conductores/{conductor_id}', 'ConductorController@show');
Route::get('conductores/{conductor_id}/edit', 'ConductorController@edit');
Route::post('conductores/{conductor_id}/edit', 'ConductorController@update');
Route::get('conductores/create', 'ConductorController@create');
Route::post('conductores/create', 'Conductorontroller@store');

Route::get('empresas/', 'EmpresaController@index')->name("empresas");
Route::get('empresas/new', 'EmpresaController@create')->name("empresas_new");
Route::post('empresas/new', 'EmpresaController@store');
Route::get('empresas/{id}', 'EmpresaController@show')->name("empresas_detail");
Route::get('empresas/{id}/edit', 'EmpresaController@edit')->name("empresas_edit");
Route::post('empresas/{id}/edit', 'EmpresaController@update');

Route::get('buses/', 'BusController@index')->name("buses");
Route::get('buses/new', 'BusController@create')->name("buses_new");
Route::post('buses/new', 'BusController@store');
Route::get('buses/{id}', 'BusController@show')->name("buses_detail");
Route::get('buses/{id}/edit', 'BusController@edit')->name("buses_edit");
Route::post('buses/{id}/edit', 'BusController@update');

Route::get('licencias/', 'LicenciaController@index')->name("licencias");
Route::get('licencias/new', 'LicenciaController@create')->name("licencias_new");
Route::post('licencias/new', 'LicenciaController@store');
Route::get('licencias/{id}', 'LicenciaController@show')->name("licencias_detail");
Route::get('licencias/{id}/edit', 'LicenciaController@edit')->name("licencias_edit");
Route::post('licencias/{id}/edit', 'LicenciaController@update');

Route::get('tipos/', 'TipoController@index')->name("tipos");
Route::get('tipos/new', 'TipoController@create')->name("tipos_new");
Route::post('tipos/new', 'TipoController@store');
Route::get('tipos/{id}', 'TipoController@show')->name("tipos_detail");
Route::get('tipos/{id}/edit', 'TipoController@edit')->name("tipos_edit");
Route::post('tipos/{id}/edit', 'TipoController@update');

Route::get('clientes/', 'ClienteController@index')->name("clientes");
Route::get('clientes/new', 'ClienteController@create')->name("clientes_new");
Route::post('clientes/new', 'ClienteController@store');
Route::get('clientes/{id}', 'ClienteController@show')->name("clientes_detail");
Route::get('clientes/{id}/edit', 'ClienteController@edit')->name("clientes_edit");
Route::post('clientes/{id}/edit', 'ClienteController@update');