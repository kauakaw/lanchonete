<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // por enquanto qualquer usuário pode; autorização entra mais adiante
    }

    public function rules(): array
    {
        // Se estiver editando, o model vem pela rota (route model binding)
        $ProdutoId = $this->route('produto')?->id;

        return [
            'nome' => [
                'required',
                'string',
                'max:100',
                Rule::unique('produtos', 'nome')->ignore($produtosId),
            ],
            'preco' =>  'numeric|min:0',
            'descricao' => 'nullable|string|max:500',
            'ativa' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Informe o nome da categoria.',
            'nome.max' => 'O nome deve ter no máximo :max caracteres.',
            'nome.unique' => 'Já existe uma categoria com este nome.',
            'descricao.max' => 'A descrição deve ter no máximo :max caracteres.',
        ];
    }
}
