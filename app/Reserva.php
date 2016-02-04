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
}
