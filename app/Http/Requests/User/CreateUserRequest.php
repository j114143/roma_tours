<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
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
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:16',
            'nombre' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'dni' => 'required|integer|digits:8',
            'telefono'    => 'required|integer|digits_between:7,9',
            'direccion'  => 'required|max:100',
        ];
    }
}
