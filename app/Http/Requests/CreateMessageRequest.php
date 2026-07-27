<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
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
            'message' => ['required', 'max:180'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120']
        ];
    }

    public function messages() {
        return [
            'message.required' => 'El mensaje no puede estar vacío',
            'message.max' => 'El mensaje no puede superar los 180 caracteres',
            'image.required' => 'Debes adjuntar una imagen',
            'image.image' => 'El archivo debe ser una imagen',
            'image.mimes' => 'La imagen debe ser jpeg, png, jpg o gif',
            'image.max' => 'La imagen no puede superar los 5MB',
        ];
    }
}
