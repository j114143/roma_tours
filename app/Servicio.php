<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    //
    protected $table = 'servicios';
    protected $fillable = ['nombre', 'tipo_id', 'precio_dolares','precio_soles','descripcion'];
    function tipo()
    {
        return $this->belongsTo('App\Tipo', 'tipo_id');
    }
}
