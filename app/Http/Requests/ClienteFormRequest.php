<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:120|min:5 ',
            'telefone' => 'required|max:11|min:10',
            'email' => 'required|max:120|unique:clientes,email|email:rfc,dns',
            'cpf' => 'required|unique:clientes,cpf|max:11|min:11',
            'endereco' => 'required|max:120',
            'foto' => 'required|max:100',
            'password' => 'required'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'nome.required' => "O campo nome é obrigatorio",
            'nome.max' => 'O campo nome deve conter no máximo 120 caracteres',
            'nome.min' => 'O campo nome deve conter no minimo 5 caracteres',

            'telefone.required' => 'telefone obrigatorio',
            'telefone.max' => 'telefone deve conter no maximo 11 caracteres',
            'telefone.min' => 'telefone deve conter no minimo 10 caracteres',

            'email.required' => 'Email obrigatorio',
            'email.max' => 'O campo e-mail deve conter no máximo 120 caracteres',
            'email.email' => 'Formato de email invalido',
            'email.unique' => 'E-mail já cadastrado',

            'cpf.required' => 'CPF obrigatório',
            'cpf.max' => 'CPF deve conter no máximo 11 caracteres',
            'cpf.min' => 'CPF deve conter no mínimo 11 caracteres',
            'cpf.unique' => 'CPF Já cadastrado no sistema',

            'endereco.required' => 'endereco obrigatório',
            'endereco.max' => 'O campo endereco deve conter no máximo 120 caracteres',
            
            'password.required' => 'password obrigatoria'
        ];
    }
}