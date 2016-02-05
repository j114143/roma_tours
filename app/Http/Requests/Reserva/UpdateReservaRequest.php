<?php

namespace App\Http\Requests\Reserva;

use App\Http\Requests\Request;

class UpdateReservaRequest extends Request
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
            'lugar_inicio' => 'required',
            'lugar_fin' => 'required',
            'precio_soles' => 'required|numeric',
            'precio_dolares' => 'required|numeric',
        ];
    }
}
