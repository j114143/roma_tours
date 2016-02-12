<?php

namespace App\Http\Requests\Servicio;

use App\Http\Requests\Request;

class CreateServicioRequest extends Request
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
            'nombre'     => 'required|min:3|max:128',
            'duracion' => 'required|numeric|max:24|min:1',
            'tipo_id' => 'required|exists:tipo_servicios,id',
            'descripcion'  => 'required',
        ];
    }
}
