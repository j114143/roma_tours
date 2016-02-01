<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $table = 'conductors';
    protected $fillable = ['nombres', 'apellidos', 'dni','direccion','telefono','email'];
}
