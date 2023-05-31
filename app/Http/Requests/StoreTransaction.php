<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransaction extends FormRequest
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
            'operation' => ['required'],
            'account_id' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'operation.required' => 'Campo operação é obrigatório!',
            'account_id.required' => 'Campo conta é obrigatório!',
            'price.required' => 'Campo valor é obrigatório!',
            'description.required' => 'Campo descrição é obrigatório!',
        ];
    }
}
