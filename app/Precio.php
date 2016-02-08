<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    protected $primaryKey = 'servicio_id,tipo_bus_id';
    function tipoBus()
    {
        return $this->belongsTo('App\TipoBus', 'tipo_bus_id');
    }
    function servicio()
    {
        return $this->belongsTo('App\Servicio', 'servicio_id');
    }
}
