<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $fillable =['servicio_id', 'cliente_id', 'bus_id', 'cantidad_pasajeros', 'fecha_reserva', 'duracion','lugar_inicio', 'lugar_fin', 'confirmado', 'hora_inicio'];
}
