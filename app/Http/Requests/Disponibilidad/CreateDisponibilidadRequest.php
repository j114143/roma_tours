<?php

namespace App\Http\Requests\Disponibilidad;

use App\Http\Requests\Request;

class CreateDisponibilidadRequest extends Request
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
            'servicio_id' => 'required|exists:servicios,id',
            'bus_id' => 'required|exists:buses,id',
            'hora' => 'required',
            'fecha' => 'required',
        ];
    }
}
