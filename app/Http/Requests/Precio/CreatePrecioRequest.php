<?php

namespace App\Http\Requests\Precio;

use App\Http\Requests\Request;

class CreatePrecioRequest extends Request
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
            'servicio_id' => 'required|numeric',
            'tipo_bus_id' => 'required|numeric',
            'precio_soles' => 'required|numeric',
            'precio_dolares' => 'required|numeric',
        ];
    }
}
