<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'name'=>['required','string','min:2','max:255'],
            'email'=>['required','string','email','max:255','unique:users'],
            'password'=>['required','confirmed', Rules\Password::defaults()],
        ];
    }

    public function messages(){
        return ['name.required'=>'El nombre completo es obligatorio',
                'name.unique'=>'El nombre completo ya existe',
                'name.max'=>'El nombre completo debe tener como máximo 255 caracteres',
                'email.required'=>'El email de usuario es obligatorio',
                'email.max'=>'El emeail debe tener como máximo 255 caracteres',
                'email.unique'=>'El email ya existe',
                'password.required'=>'La contraseña es obligatoria',
                'password.confirmed'=>'Las contraseñas no coinciden',
                'password.min'=>'La contraseña debe tener al menos 8 caracteres',
            ];
    }
}
