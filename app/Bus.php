<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'buses';
    protected $fillable = ['placa', 'cantidad_asientos','numero_motor','fecha_fabricacion','modelo','numero_soat','numero_seguro','revicion_tecnica','conductor_id'];
}
