<?php

namespace App\Http\Requests\Conductor;

use App\Http\Requests\Request;

class CreateConductorRequest extends Request
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
            'nombres'     => 'required|min:3|max:32',
            'apellidos'     => 'required|min:3|max:32',
            'dni' => 'required|integer|digits_between:6,8|unique:conductors',
            'telefono'  => 'required|integer|digits:9',
            'email' =>'email',
        ];
    }
}