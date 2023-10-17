<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profissional_id' => 'required',
            'cliente_id' => 'required',
            'servico_id' => 'required',
            'data_hora' => 'required|date',
            'tipo_pagamento' => 'required|max:20|min:3',
            'valor' => 'required|decimal:2,4'
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return[
        'profisssional_id.required' => 'Campo profissional é obrigatório',
        'cliente_id.required' => 'Campo cliente é obrigatório',
        'servico_id.required' => 'Campo serviço é obrigatório',
        'data_hora.required' => 'Campo data é obrigatório',
        'data_hora.date' => 'Formato Inválido',
        'tipo_pagamento.required' => 'Campo pagamento é obrigatório',
        'tipo_pagamento.max' => 'Campo pagamento deve conter no maximo 20 caracteres',
        'tipo_pagamento.min' => 'Campo pagamento deve conter no minimo 3 caracteres',
        'valor.required' => 'Campo valor é obrigatório',
        'valor.decimal' => 'Este campo so aceita numero decimal'
        ];
    }
}