<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearMensajeRequest extends FormRequest
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
            'mensaje' => ['required', 'max:180']
        ];
    }

    public function messages() {
        return [
            'mensaje.required' => 'El mensaje no puede estar vacío',
            'mensaje.max' => 'El mensaje no puede superar los 180 caracteres',
        ];
    }
}
