<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEquipamento extends FormRequest
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
        'numeroIp', 'setor', 'equipamento' => 'required'
        ];
    }

    public function messages()
    {
    return [
        'required' => 'Campos com "*" são obrigatórios.'
        ];
    }
}
