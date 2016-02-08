<?php

namespace App\Http\Requests\TipoBus;

use App\Http\Requests\Request;

class CreateTipoBusRequest extends Request
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
            'nombre' => 'required|min:3|max:32|unique:tipo_buses',
        ];
    }
}
