<?php

namespace App\Http\Requests\Cliente;

use App\Http\Requests\Request;

class CreateClienteRequest extends Request
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
            'nombre'  => 'required',
            'di'  => 'required',
            'direccion'  => 'required',
            'telefono'  => 'required|numeric',
            'email'  => 'required|email',
        ];
    }
}
