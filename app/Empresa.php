<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $table = 'empresas';
    protected $fillable = ['empresa','razon_social','nombres', 'apellidos', 'ruc', 'dni','direccion','telefono','email'];
}
