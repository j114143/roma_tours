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
        return $this->belongsTo('App\TipoServicio', 'tipo_id');
    }
    function reservas()
    {
        return $this->hasMany('App\Reserva','servicio_id', 'id')->orderBy('id', 'desc');
    }
    function precios()
    {
        return $this->hasMany('App\Precio','servicio_id', 'id');
    }
}
