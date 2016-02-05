<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $fillable =['servicio_id', 'cliente_id', 'bus_id', 'cantidad_pasajeros', 'fecha_reserva', 'duracion','lugar_inicio', 'lugar_fin', 'confirmado', 'hora_inicio'];
    function bus()
    {
        return $this->belongsTo('App\Bus', 'bus_id');
    }
    function servicio()
    {
        return $this->belongsTo('App\Servicio', 'servicio_id');
    }
    function sku()
    {

        return "R-".str_pad($this->id, 10, "0", STR_PAD_LEFT);;
    }
    public static function getReservas()
    {
        return  \DB::table('reservas')
        ->join('clientes', 'reservas.cliente_id', '=', 'clientes.id')
        ->join('servicios', 'reservas.servicio_id', '=', 'servicios.id')
        ->join('buses', 'reservas.bus_id', '=', 'buses.id')
        ->select('reservas.id', 'reservas.fecha_inicio', 'reservas.fecha_fin', 'reservas.lugar_inicio', 'reservas.confirmado',
        'reservas.lugar_fin', 'clientes.nombre as cliente','buses.placa as bus' ,'servicios.nombre as servicio', 'servicios.id as servicio_id')
        ->get();
    }
}

