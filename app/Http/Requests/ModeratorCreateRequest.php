<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModeratorCreateRequest extends FormRequest
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
            'login'         => 'required|string',
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
            'password.required'      => 'Поле password должно быть заполнено',
            'password.string'        => 'Поле password должно быть строкой',
        ];
    }
}
