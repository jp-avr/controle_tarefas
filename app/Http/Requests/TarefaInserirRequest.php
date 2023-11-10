<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaInserirRequest extends FormRequest
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
            'tarefa_nome' => ['required', 'string', 'max:255'],
            'tarefa_data_limite_conclusao' =>  ['required','max:10', 'date']
        ];
    }

    public function messages()
    {
        return [
            'tarefa_nome.string' => 'O campo Tarefa é inválido',
            'tarefa_nome.required' => 'O campo Tarefa é obrigatório',

            'tarefa_data_limite_conclusao.date' => 'O campo Data limite conclusão é inválido.',
            'tarefa_data_limite_conclusao.required' => 'O campo Data limite conclusão é obrigatório.',
            'tarefa_data_limite_conclusao.max' => 'Valor da Data limite conclusão acima do permitido.'
        ];
        
    }
}
