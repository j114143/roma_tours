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
            'servicio_id'  => 'required|numeric',
            'bus_id'  => 'required|numeric',
            'fecha_inicio'  => 'required',
        ];
    }
}
