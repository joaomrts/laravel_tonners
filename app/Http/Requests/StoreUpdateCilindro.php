<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCilindro extends FormRequest
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
            'modelo' => 'required',
            'qtde_impressora' => 'required',
            'estoque' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.'
        ];
    }
}
