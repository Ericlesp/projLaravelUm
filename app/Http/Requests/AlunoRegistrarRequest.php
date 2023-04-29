<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRegistrarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return  [
            'nome' => ['required', 'string', 'max:30'],
            'sobrenome' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:50'],
            'idade' => ['nullable', 'integer', 'min:1', 'max:999'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O campo nome deve ter no máximo :max caracteres.',
            'sobrenome.required' => 'O campo sobrenome é obrigatório.',
            'sobrenome.max' => 'O campo sobrenome deve ter no máximo :max caracteres.',
            'email.email' => 'O campo email deve ser um endereço de e-mail válido.',
            'email.max' => 'O campo email deve ter no máximo :max caracteres.',
            'idade.integer' => 'O campo idade deve ser um número inteiro.',
            'idade.min' => 'O campo idade deve ser maior ou igual a :min.',
            'idade.max' => 'O campo idade deve ser menor ou igual a :max.',
        ];
    }
}
