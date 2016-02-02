<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    //
    function tipoBus()
    {
        return $this->belongsTo('App\TipoBus', 'tipo_bus_id');
    }
    function servicio()
    {
        return $this->belongsTo('App\Servicio', 'servicio_id');
    }
}
