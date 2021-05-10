<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaintingCreateRequest extends FormRequest
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
            'title'         => 'required|string',
            'description'   => 'required|string',
            'author_id'     => 'required|numeric|exists:authors,id',
            'creation_date' => ['required', 'string'],
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
            'title.required'         => 'Поле title должно быть заполнено',
            'title.string'           => 'Поле title должно быть строкой',
            'description.required'   => 'Поле description должно быть заполнено',
            'description.string'     => 'Поле description должно быть строкой',
            'author.required'        => 'Поле author должно быть заполнено',
            'author.string'          => 'Поле author должно быть строкой',
            'creation_date.required' => 'Поле creation_date должно быть заполнено',
            'creation_date.string'   => 'Поле creation_date должно быть строкой',
        ];
    }
}
