<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',  
            'email' => 'required|email|unique:users',
            'login' => 'required|unique:users|max:10',
            'password' => [
                'required',
                'min:3',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required'  => "Поле Имя должно быть заполнено",
            'last_name.required'  => "Поле Фамилия должно быть заполнено",
            'email.required'  => "Поле почта должно быть заполнено",
            'email.unique'  => "Данная почта уже зарегистрирована на сайте",
            'login.required'  => "Поле логин должно быть заполнено",
            'login.unique'  => "Данный логин уже зарегистрирован на сайте",
            'login.max'  => "Поле логин должно быть меньше 10 символов",
            'password.required'  => "Поле пароль должно быть заполнено",
            'password.max'  => "Поле пароль должно быть больше 3 символов"
        ];


    }
}
