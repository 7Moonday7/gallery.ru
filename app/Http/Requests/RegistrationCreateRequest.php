<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationCreateRequest extends FormRequest
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
            'login'         => 'required|string|unique:moderators',
            'email'         => 'required|email:rfc,dns|unique:moderators',
            'password'      => 'required|string',
        ];
    }

    /**
     * Сообщения об ошибках
     *
     * @return array
     */
    public function messages()
    {
        return [
            'login.required'         => 'Поле login должно быть заполнено',
            'login.string'           => 'Поле login должно быть строкой',
            'login.unique'           => 'Пользователь с таким login уже существует',
            'password.required'      => 'Поле password должно быть заполнено',
            'password.string'        => 'Поле password должно быть строкой',
            'email.required'         => 'Поле email должно быть заполнено',
            'email.email'            => 'Поле email должно быть cуществующей почтой',
            'email.unique'           => 'Такой email уже используется',
        ];
    }
}
