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
Route::get('admin/', function () {
    return view('admin');
});
Route::get('admin/servicios/', 'ServicioController@index')->name("servicios");
Route::get('admin/servicios/new', 'ServicioController@create')->name("servicios_new");
Route::post('admin/servicios/new', 'ServicioController@store');
Route::get('admin/servicios/{id}', 'ServicioController@show')->name("servicios_detail");
Route::get('admin/servicios/{id}/edit', 'ServicioController@edit')->name("servicios_edit");
Route::post('admin/servicios/{id}/edit', 'ServicioController@update');

Route::get('admin/conductores/', 'ConductorController@index')->name("conductores");
Route::get('admin/conductores/new', 'ConductorController@create')->name("conductores_new");
Route::post('admin/conductores/new', 'ConductorController@store');
Route::get('admin/conductores/{id}', 'ConductorController@show')->name("conductores_detail");
Route::get('admin/conductores/{id}/edit', 'ConductorController@edit')->name("conductores_edit");
Route::post('admin/conductores/{id}/edit', 'ConductorController@update');

Route::get('admin/empresas/', 'EmpresaController@index')->name("empresas");
Route::get('admin/empresas/new', 'EmpresaController@create')->name("empresas_new");
Route::post('admin/empresas/new', 'EmpresaController@store');
Route::get('admin/empresas/{id}', 'EmpresaController@show')->name("empresas_detail");
Route::get('admin/empresas/{id}/edit', 'EmpresaController@edit')->name("empresas_edit");
Route::post('admin/empresas/{id}/edit', 'EmpresaController@update');

Route::get('admin/buses/', 'BusController@index')->name("buses");
Route::get('admin/buses/new', 'BusController@create')->name("buses_new");
Route::post('admin/buses/new', 'BusController@store');
Route::get('admin/buses/{id}', 'BusController@show')->name("buses_detail");
Route::get('admin/buses/{id}/edit', 'BusController@edit')->name("buses_edit");
Route::post('admin/buses/{id}/edit', 'BusController@update');

Route::get('admin/licencias/', 'LicenciaController@index')->name("licencias");
Route::get('admin/licencias/new', 'LicenciaController@create')->name("licencias_new");
Route::post('admin/licencias/new', 'LicenciaController@store');
Route::get('admin/licencias/{id}', 'LicenciaController@show')->name("licencias_detail");
Route::get('admin/licencias/{id}/edit', 'LicenciaController@edit')->name("licencias_edit");
Route::post('admin/licencias/{id}/edit', 'LicenciaController@update');

Route::get('admin/tipo_servicios/', 'TipoController@index')->name("tipo_servicios");
Route::get('admin/tipo_servicios/new', 'TipoController@create')->name("tipo_servicios_new");
Route::post('admin/tipo_servicios/new', 'TipoController@store');
Route::get('admin/tipo_servicios/{id}', 'TipoController@show')->name("tipo_servicios_detail");
Route::get('admin/tipo_servicios/{id}/edit', 'TipoController@edit')->name("tipo_servicios_edit");
Route::post('admin/tipo_servicios/{id}/edit', 'TipoController@update');

Route::get('admin/clientes/', 'ClienteController@index')->name("clientes");
Route::get('admin/clientes/new', 'ClienteController@create')->name("clientes_new");
Route::post('admin/clientes/new', 'ClienteController@store');
Route::get('admin/clientes/{id}', 'ClienteController@show')->name("clientes_detail");
Route::get('admin/clientes/{id}/edit', 'ClienteController@edit')->name("clientes_edit");
Route::post('admin/clientes/{id}/edit', 'ClienteController@update');

Route::get('reservar/', 'BookController@create')->name("reservar");
Route::post('reservar/', 'BookController@storage');
Route::get('reservar/servicio', 'BookController@servicio')->name("reservar_servicio");