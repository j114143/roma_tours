<?php

namespace App\Http\Requests\Empresa;

use App\Http\Requests\Request;

class CreateEmpresaRequest extends Request
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
            'razon_social'  => 'required',
            'ruc'  => 'required',
            'direccion'  => 'required',
            'telefono'  => 'required',
            'email'  => 'required',
        ];
    }
}
