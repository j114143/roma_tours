<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model
{
    protected $table = 'disponibilidades';
    function bus()
    {
        return $this->belongsTo('App\Bus', 'bus_id');
    }
    function servicio()
    {
        return $this->belongsTo('App\Servicio', 'servicio_id');
    }
}
