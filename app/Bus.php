<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Precio;

class Bus extends Model
{
    protected $table = 'buses';
    protected $fillable = ['placa', 'cantidad_asientos','numero_motor','fecha_fabricacion','modelo','numero_soat','numero_seguro','revicion_tecnica','conductor_id'];
    function tipo()
    {
        return $this->belongsTo('App\TipoBus', 'tipo_id');
    }
    function precios($servicioId)
    {
        $obj = Precio::where(array("servicio_id"=>$servicioId,"tipo_bus_id"=>$this->tipo_id))->first();
        if (count($obj)>0)
        {
            return $obj;
        }
        $precio = new Precio;
        $precio->precio_soles = "-.--";
        $precio->precio_dolares = "-.--";
        return $precio;
    }
    function reservas()
    {
        return $this->hasMany('App\Reserva','bus_id', 'id');
    }
}
