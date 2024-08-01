<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class pacientesFormRequest extends FormRequest
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
            'nome' => 'required|max:120',
            'data_nascimento' => 'required|date',
            'endereco' => 'required|max:255',
            'email' => 'required|max:255',
            'cpf' => 'required|max:11|unique',
            'celular' => 'required|max:11',
            'senha' => 'required|max:200',

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
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O campo nome deve conter no máximo 255 caracteres.',
            'data_nascimento.required' => 'O campo data de nascimento é obrigatório.',
            'data_nascimento.DATE' => 'O campo data de nascimento deve ser uma data.',
            'endereco.required' => 'O campo endereco é obrigatório.',
            'endereco.max' => 'O campo endereco deve conter no máximo 255 caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.max' => 'O campo email deve conter no máximo 300 caracteres.',
            'cpf.required' => 'O campo cpf é obrigatório.',
            'cpf.max' => 'O campo cpf deve conter no máximo 11 números.',
            'cpf.unique' => 'cpf já cadastrado.',
            'celular.required' => 'O campo celular é obrigatório.',
            'celular.max' => 'O campo celular deve conter no máximo 11 números.',
            'senha.required' => 'O campo senha é obrigatório.',
            'senha.max' => 'O campo senha deve conter no máximo 200 caracteres.',

        ];
    }
}
