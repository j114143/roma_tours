<?php

namespace App\Http\Requests\Precio;

use App\Http\Requests\Request;

class UpdatePrecioRequest extends Request
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
            'precio_soles' => 'required|numeric|min:1',
            'precio_dolares' => 'required|numeric|min:1',
        ];
    }
}
