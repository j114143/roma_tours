<?php

namespace App\Http\Requests\Bus;

use App\Http\Requests\Request;

class CreateBusRequest extends Request
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
            'placa'  => 'required',
            'cantidad_asientos'  => 'required',
            'numero_motor'  => 'required',
            'fecha_fabricacion'  => 'required',
            'modelo'  => 'required',
            'numero_soat'  => 'required',
            'numero_seguro'  => 'required',
            'revision_tecnica'  => 'required',
        ];
    }
}
