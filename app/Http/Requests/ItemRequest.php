<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Summary of rules
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'campo nome deve ser preenchido',
            'name.string' => 'campo nome deve ser uma string',
            'name.max' => 'campo nome não pode ter mais que 255 caracteres',

            'description.required' => 'campo descrição deve ser preenchido',
            'description.string' => 'campo descrição deve ser uma string',

            'price.required' => 'o campo preço deve ser preenchido',
            'price.integer' => 'o campo "reço deve ser um numero',

        ];
    }
}
