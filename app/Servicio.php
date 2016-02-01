<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    //
    protected $table = 'servicios';
    protected $fillable = ['nombre', 'precio_dolares','precio_soles','descripcion'];
}
