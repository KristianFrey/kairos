<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            'nome' => 'required|string|max:120',
            'telefone' => 'required|max:20|regex:/^[0-9\-\(\)\s]+$/',
            'email' => 'nullable|max:150|email|unique:cliente,email',
            'cpf' => 'nullable|max:20|unique:cliente,cpf',
            'dt_nascimento' => 'nullable|date|before:today'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O :attribute é obrigatório.',
            'nome.string' => 'O :attribute deve ser em formato de texto.',
            'nome.max' => 'O :attribute deve ter no máximo 120 caracteres.',
            'telefone.required' => 'O :attribute é obrigatório.',
            'telefone.max' => 'O :attribute deve ter no máximo 20 caracteres.',
            'telefone.regex' => 'O :attribute deve ter formato válido.',
            'email.max' => 'O :attribute deve ter no máximo 150 caracteres.',
            'email.email' => 'O :attribute deve ter formato válido.',
            'email.unique' => 'Este :attribute já foi cadastrado.',
            'cpf.max' => 'O CPF deve ter no máximo 20 caracteres.',
            'cpf.unique' => 'Este CPF já foi cadastrado.',
            'dt_nascimento.date' => 'A data de nascimento deve ter formato válido.',
            'dt_nascimento.before' => 'A data de nascimento não pode ser uma data futura.',
        ];
    }
}
