<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateadministradorRequest extends FormRequest
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
            'ci' => 'required|max:10',
            'nombre' => 'required|min:3',
            'apellido' => 'required|min:3',
            'url_huella' => 'nullable',
            'tel' => 'nullable|max:15',
            'email' => 'required|email|min:10:max:50',
            'fecha_naci' => 'required',
            'genero' ,
            //'tipo' => ['required', 'max:1'],
            //'especialidad' => ['required'],
            'usuario' => 'required|min:3',
            'password' => 'required|min:8',
        ];
    }
}
