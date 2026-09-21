<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('email')) {
            $this->merge([
                'email' => strtolower(trim((string) $this->input('email'))),
            ]);
        }

        if ($this->filled('telefone')) {
            $this->merge([
                'telefone' => preg_replace('/[^0-9]/', '', (string) $this->input('telefone')),
            ]);
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'telefone' => ['nullable', 'string', 'regex:/^[0-9]{10,11}$/'],
            'escola' => ['nullable', 'string', 'max:255'],
            'cargo' => ['nullable', 'string', Rule::in(['diretor', 'coordenador', 'secretaria', 'ti', 'professor', 'outro'])],
            'quantidade_alunos' => ['nullable', 'integer', 'min:1', 'max:100000'],
            'mensagem' => ['nullable', 'string', 'max:2000'],
            'consentimento' => ['accepted'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'Informe seu nome.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',
            'email.required' => 'Informe um e-mail para retornarmos o contato.',
            'email.email' => 'Informe um e-mail válido.',
            'telefone.regex' => 'Informe um telefone com DDD (10 ou 11 dígitos).',
            'cargo.in' => 'Selecione um cargo válido.',
            'quantidade_alunos.integer' => 'Informe a quantidade de alunos em números.',
            'quantidade_alunos.min' => 'A quantidade de alunos deve ser pelo menos 1.',
            'quantidade_alunos.max' => 'Informe uma quantidade de alunos válida.',
            'mensagem.max' => 'A mensagem não pode ter mais de 2000 caracteres.',
            'consentimento.accepted' => 'É necessário concordar com o uso dos seus dados para contato.',
        ];
    }
}
