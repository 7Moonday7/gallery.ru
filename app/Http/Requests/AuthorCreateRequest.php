<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorCreateRequest extends FormRequest
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
            'name'         => 'required|string',
            'born_date'    => 'required|string',
            'death_date'   => 'string',
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
            'name.required'         => 'Поле name должно быть заполнено',
            'name.string'           => 'Поле name должно быть строкой',
            'born_date.required'    => 'Поле born_date должно быть заполнено',
            'born_date.string'      => 'Поле born_date должно быть строкой',
            'death_date.string'     => 'Поле death_date должно быть строкой',
        ];
    }
}
