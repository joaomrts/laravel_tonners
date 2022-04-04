<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateBots extends FormRequest
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
            'nome_grupo'  => 'required',
            'bot_id' => 'required',
            'chat_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Todos os campos são obrigatórios.'
        ];
    }
}
