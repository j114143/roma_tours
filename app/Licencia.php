<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{

    protected $table = 'licencias';
    protected $fillable = ['conductor_id', 'numero_licencia', 'fecha_emision','fecha_revalidacion','direccion'];
    function conductor()
    {
        return $this->belongsTo('App\Conductor', 'conductor_id');
    }
}
