<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $table = 'conductors';
    protected $fillable = ['nombres', 'apellidos', 'dni','direccion','telefono','email'];

    public function licencia()
    {
        return $this->hasOne('App\Licencia');
    }
    public function bus()
    {
        return $this->hasOne('App\Bus');
    }
}
