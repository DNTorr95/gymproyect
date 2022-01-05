<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreclienteRequest extends FormRequest
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
            'ci' => 'required|max:10|unique:personas',
            'nombre' => 'required|min:3',
            'apellido' => 'required|min:3',
            'url_huella' => 'nullable|unique:personas',
            'tel' => 'nullable|max:15',
            'foto' => 'nullable',
            'email' => 'required|email|min:10:max:50|unique:personas',
            'fecha_naci' => 'required',
            'genero' => 'required|max:1',
            //'tipo' => ['required', 'max:1'],
            
            'edad' => ['required'],
        ];
    }
}
