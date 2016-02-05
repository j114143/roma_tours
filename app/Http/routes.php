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

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::group(['middleware' => ['auth']], function () {
Route::get('admin/conductores/', 'ConductorController@index')->name("conductores");
Route::get('admin/', function () { return view('admin');});
Route::get('admin/servicios/', 'ServicioController@index')->name("servicios");
Route::get('admin/servicios/new', 'ServicioController@create')->name("servicios_new");
Route::post('admin/servicios/new', 'ServicioController@store');
Route::get('admin/servicios/{id}', 'ServicioController@show')->name("servicios_detail");
Route::get('admin/servicios/{id}/edit', 'ServicioController@edit')->name("servicios_edit");
Route::post('admin/servicios/{id}/edit', 'ServicioController@update');

Route::get('admin/conductores/new', 'ConductorController@create')->name("conductores_new");
Route::post('admin/conductores/new', 'ConductorController@store');
Route::get('admin/conductores/{id}', 'ConductorController@show')->name("conductores_detail");
Route::get('admin/conductores/{id}/edit', 'ConductorController@edit')->name("conductores_edit");
Route::post('admin/conductores/{id}/edit', 'ConductorController@update');

Route::get('admin/clientes/', 'ClienteController@index')->name("clientes");
Route::get('admin/clientes/new', 'ClienteController@create')->name("clientes_new");
Route::post('admin/clientes/new', 'ClienteController@store');
Route::get('admin/clientes/{id}', 'ClienteController@show')->name("clientes_detail");
Route::get('admin/clientes/{id}/edit', 'ClienteController@edit')->name("clientes_edit");
Route::post('admin/clientes/{id}/edit', 'ClienteController@update');

Route::get('admin/buses/', 'BusController@index')->name("buses");
Route::get('admin/buses/new', 'BusController@create')->name("buses_new");
Route::post('admin/buses/new', 'BusController@store');
Route::get('admin/buses/{id}', 'BusController@show')->name("buses_detail");
Route::get('admin/buses/{id}/edit', 'BusController@edit')->name("buses_edit");
Route::post('admin/buses/{id}/edit', 'BusController@update');

Route::get('admin/licencias/', 'LicenciaController@index')->name("licencias");
Route::get('admin/licencias/new/{id}', 'LicenciaController@create')->name("licencias_new");
Route::post('admin/licencias/new/{id}', 'LicenciaController@store');
Route::get('admin/licencias/{id}', 'LicenciaController@show')->name("licencias_detail");
Route::get('admin/licencias/{id}/edit', 'LicenciaController@edit')->name("licencias_edit");
Route::post('admin/licencias/{id}/edit', 'LicenciaController@update');

Route::get('admin/tipo_servicios/', 'TipoServicioController@index')->name("tipo_servicios");
Route::get('admin/tipo_servicios/new', 'TipoServicioController@create')->name("tipo_servicios_new");
Route::post('admin/tipo_servicios/new', 'TipoServicioController@store');
Route::get('admin/tipo_servicios/{id}', 'TipoServicioController@show')->name("tipo_servicios_detail");
Route::get('admin/tipo_servicios/{id}/edit', 'TipoServicioController@edit')->name("tipo_servicios_edit");
Route::post('admin/tipo_servicios/{id}/edit', 'TipoServicioController@update');

Route::get('admin/clientes/', 'ClienteController@index')->name("clientes");
Route::get('admin/clientes/new', 'ClienteController@create')->name("clientes_new");
Route::post('admin/clientes/new', 'ClienteController@store');
Route::get('admin/clientes/{id}', 'ClienteController@show')->name("clientes_detail");
Route::get('admin/clientes/{id}/edit', 'ClienteController@edit')->name("clientes_edit");
Route::post('admin/clientes/{id}/edit', 'ClienteController@update');

Route::get('admin/tipo_buses/', 'TipoBusController@index')->name("tipo_buses");
Route::get('admin/tipo_buses/new', 'TipoBusController@create')->name("tipo_buses_new");
Route::post('admin/tipo_buses/new', 'TipoBusController@store');
Route::get('admin/tipo_buses/{id}', 'TipoBusController@show')->name("tipo_buses_detail");
Route::get('admin/tipo_buses/{id}/edit', 'TipoBusController@edit')->name("tipo_buses_edit");
Route::post('admin/tipo_buses/{id}/edit', 'TipoBusController@update');

Route::get('admin/disponibilidades/', 'DisponibilidadController@index')->name("disponibilidades");
Route::get('admin/disponibilidades/new', 'DisponibilidadController@create')->name("disponibilidades_new");
Route::post('admin/disponibilidades/new', 'DisponibilidadController@store');
Route::get('admin/disponibilidades/{id}', 'DisponibilidadController@show')->name("disponibilidades_detail");
Route::get('admin/disponibilidades/{id}/edit', 'DisponibilidadController@edit')->name("disponibilidades_edit");
Route::post('admin/disponibilidades/{id}/edit', 'DisponibilidadController@update');

Route::get('admin/precios/', 'PrecioController@index')->name("precios");
Route::get('admin/precios/new', 'PrecioController@create')->name("precios_new");
Route::post('admin/precios/new', 'PrecioController@store');
Route::get('admin/precios/{servicio_id}/{tipo_bus_id}', 'PrecioController@show')->name("precios_detail");
Route::get('admin/precios/{servicio_id}/{tipo_bus_id}/edit', 'PrecioController@edit')->name("precios_edit");
Route::post('admin/precios/{servicio_id}/{tipo_bus_id}/edit', 'PrecioController@update');

Route::get('admin/reservas/', 'ReservaController@index')->name("reservas");
Route::get('admin/reservas/new', 'ReservaController@create')->name("reservas_new");
Route::post('admin/reservas/new', 'ReservaController@store');
Route::get('admin/reservas/{id}', 'ReservaController@show')->name("reservas_detail");
Route::get('admin/reservas/{id}/edit', 'ReservaController@edit')->name("reservas_edit");
Route::post('admin/reservas/{id}/edit', 'ReservaController@update');
Route::get('admin/reservas/{id}/confirmar', 'ReservaController@confirmar')->name("reservas_confirmar");
Route::post('admin/reservas/{id}/confirmar', 'ReservaController@confirmarUpdate');

});

Route::get('book_now/servicio', 'BookController@servicio')->name("book_now_servicio");
Route::get('book/{id}', 'BookController@show')->name("book_detail");
Route::get('book_now/now/{busId}/{servicioId}', 'BookController@create')->name("book_now");
Route::post('book_now/now/{busId}/{servicioId}', 'BookController@store');
Route::get('book_now/verify', 'BookController@verify')->name("verify");
Route::post('book_now/verify', 'BookController@check');
Route::get('disponibilidad_bus', 'BookController@disponibilidad')->name("disponibilidad_bus");
Route::post('disponibilidad_bus', 'BookController@disponibilidadBus');

Route::get('admin/reservas/status', 'BookController@status')->name("reservas_status");

