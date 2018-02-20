<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            //
            'name'=>'required|max:120|unique:categories'
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'El nombre debe se tener menos de 120 caracteres!',
            'name.unique'=>'El nombre ya esta registrado!',
        ];
    }
}
