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
            'profissional_Id' => 'required|integer',
            'cliente_Id' => 'integer',
            'servico_Id'  => 'integer',
            'dataHora' => 'required|date|unique:agendas,dataHora',
            'pagamento' => 'required|max:20|min:3',
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
        'profissional_Id.required' => 'Campo profissional é obrigatório',
        'cliente_Id.required' => 'Campo cliente é obrigatório',
        'servico_Id.required' => 'Campo serviço é obrigatório',
        'dataHora.required' => 'Campo data é obrigatório',
        'dataHora.date' => 'Formato Inválido',
        'dataHora.unique' => 'esse horario já foi reservado',
        'pagamento.required' => 'Campo pagamento é obrigatório',
        'pagamento.max' => 'Campo pagamento deve conter no maximo 20 caracteres',
        'pagamento.min' => 'Campo pagamento deve conter no minimo 3 caracteres',
        'valor.required' => 'Campo valor é obrigatório',
        'valor.decimal' => 'Este campo so aceita numero decimal'
        ];
}
}