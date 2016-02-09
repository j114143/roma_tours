<?php

namespace App\Http\Requests\Bus;

use App\Http\Requests\Request;

class ConductorBusRequest extends Request
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
            'conductor_id'  => 'required|exists:conductors,id'
        ];
    }
}
