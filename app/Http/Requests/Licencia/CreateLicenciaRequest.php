<?php

namespace App\Http\Requests\Licencia;

use App\Http\Requests\Request;

class CreateLicenciaRequest extends Request
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
            'numero_licencia'  => 'required',
            'fecha_emision'  => 'required',
            'fecha_revalidacion'  => 'required',
            'direccion'  => 'required',
        ];
    }
}
