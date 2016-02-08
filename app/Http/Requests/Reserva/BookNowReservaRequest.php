<?php

namespace App\Http\Requests\Reserva;

use App\Http\Requests\Request;

class BookNowReservaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lugar_inicio'  => 'required',
            'lugar_fin'  => 'required',
            'es_empresa'  => 'required|numeric',
            'servicio_id'  => 'required|numeric',
            'bus_id'  => 'required|numeric',
            'documento'  => 'required',
            'fecha_inicio'  => 'required',
            'nombre'  => 'required',
            'direccion'  => 'required',
            'telefono'  => 'required|numeric',
            'email'  => 'required|email',
        ];
    }
}
