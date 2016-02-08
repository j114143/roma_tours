<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['empresa','nombre', 'ruc', 'dni','direccion','telefono','email'];
    function reservas()
    {
        return $this->hasMany('App\Reserva','cliente_id', 'id');
    }
}
