<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name' => ['required','alpha','max:110','min:2'],
            'lastname' => ['required','alpha','max:110','min:2'],
            'nick' => ['required','regex:(^[a-zA-Z0-9.]+$)','max:80','min:2','unique:users,user_name'],
            'email' => ['required','email','max:100','unique:users,email'],
            'role' => ['required','numeric','exists:roles,id'],
            'city' => ['required','numeric','exists:cities,id'],
            'password' => ['required','confirmed','min:6','max:12']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo Nombre es obligatorio',
            'name:alpha' => 'Solo se permite el uso de letras',
            'name.max' => 'Nombre no puede superar los 110 caracteres',
            'name.min' => 'Nombre debe ser superior a 2 letras',

            'lastname.required' => 'Campo Apellido es obligatorio',
            'lastname:alpha' => 'Solo se permite el uso de letras',
            'lastname.max' => 'Apellido no puede superar los 110 caracteres',
            'lastname.min' => 'Apellido debe ser superior a 2 letras',

            'nick.required' => 'Campo NIck/Nombre de usuario es obligatorio',
            'nick.regex' => 'Solo se permite el uso de letras, numeros, y punto (.)',
            'nick.max' => 'Nick  no puede superar los 80 caracteres',
            'nick.min' => 'Nick debe ser superior a 2 caracteres',
            'nick.unique' => 'El Nombre de usuario o nick ya existe',

            'email.required' => 'Campo Correo Electronico es obligatorio',
            'email.email' => 'No es un formato de corre electronico',
            'email.max' => 'tu correo no debe superar los 100 caracteres',
            'email.unique' => 'Correo Electronico ya existe',

            'role_id.required' => 'Debes Seleccionar un Rol',
            'role_id.numeric'  => 'Algo malo ha ocurrido, refresca tu navegador',
            'role_exists' => 'Algo malo ha ocurrido, refresca tu navegador',

            'city_id.required' => 'Debes Seleccionar un Rol',
            'city_id.numeric'  => 'Algo malo ha ocurrido, refresca tu navegador',
            'city_id_exists' => 'Algo malo ha ocurrido, refresca tu navegador',

            'password.required' => 'La contrasela es obligatoria',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'La contraseña debe ser minimo de 6 caracteres',
            'password.max' => 'La contrasela no debe superar los 12 caracteres'
        ];
    }
}