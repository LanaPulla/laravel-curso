<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool //retorna um boolean validando se o usuario pode ou nao ter autorização para algo ou nao
    {
        return true; //usuario true = pode 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array //onde se coloca as validações do form, com os nomes q esta la no 'html'
    {
        $rules = [ //guardadno os dados de validaçao em uma var 
            'subject' => 'required|min:3|max:255|unique:supports', //posso fazer assim separado por | OU por array igual aqui embaixo
            'body' => [
                'required',
                'min:3',
                'max:10000'
            ]
        ];

        //para o metodo deixar atualizar o body sem editar o assunto e o token nao dar problema criamos um IF method PUT e nao POST
        if($this->method() === 'PUT'){ 
            $rules['subject']=[  //as regras mudam se for PUT
                'required',
                'min:3',
                'max:255',
               //"unique:supports,subject,{$this->id},id", "ele é unico na tabela supports, para coluna subject, MAS ADICIONA UMA EXCESSAO QUANDO O ID FOR IGUAL AO ID"
               Rule::unique('supports')->ignore($this->id),
                
            ];
        }

        return $rules;
    }
}
