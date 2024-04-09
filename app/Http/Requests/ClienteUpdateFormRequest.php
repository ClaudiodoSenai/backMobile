<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteUpdateFormRequest extends FormRequest
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
            'nome' => 'max:120|min:5 ',
            'telefone' => 'max:11|min:10',
            'email' => 'max:120|email:rfc,|unique:clientes,email,'. $this->id,
            'cpf' => 'max:11|min:11|unique:clientes,cpf,'. $this->id,
            'endereco' => 'max:120',
            'foto' => 'max:100',
            'password' => ''
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
            'nome.max' => 'O campo nome deve conter no máximo 120 caracteres',
            'nome.min' => 'O campo nome deve conter no minimo 5 caracteres',

            'telefone.max' => 'telefone deve conter no maximo 11 caracteres',
            'telefone.min' => 'telefone deve conter no minimo 10 caracteres',

            'email.max' => 'O campo e-mail deve conter no máximo 120 caracteres',
            'email.email' => 'Formato de email invalido',
            'email.unique' => 'E-mail já cadastrado',

            'cpf.max' => 'CPF deve conter no máximo 11 caracteres',
            'cpf.min' => 'CPF deve conter no mínimo 11 caracteres',
            'cpf.unique' => 'CPF Já cadastrado no sistema',

            'endereco.max' => 'O campo endereco deve conter no máximo 120 caracteres',

        ];
    }
}
