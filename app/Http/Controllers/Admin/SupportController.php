<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support){ //cria o objeto e coloca dentro da variavel como se fosse isso $support = new Support();

        $supports =  $support->all(); //aqui eu tenho um array de dados

        return view('admin/supports/index', compact('supports', )); //retornar a pag quando o metodo for chamado e retorna o support com os dados da tabela
        //compac criou um array com o mesmo valor da var supports e retornou ele 
    }

    public function show(string | int $id){

        //posso retornar valores com o Support::find($id) ou Support::where('id', '=' '$id')->first()

        if(!$support = Support::find($id)){ //se o id for null... 
            return redirect()->back(); //... ele vai voltar para pag que o usuario tava antes 
        }
        
        return view('admin/supports/show', compact('support')); //retorna a pag com id clicado pelo usuario com os dados procurados pela var 'support'
    }


    public function create(){
        return view('admin/supports/create'); //retornando a pag de formulario...
    }

    public function store(Request $request, Support $support){ //cria o objeto e coloca dentro da variavel o resquest, para a var acessar os dados de request

        /*
        request tem varios metodos, como:
        request->all() q pega todo
        request->only(nome da coluna na tabela ex: 'subjetc') OU request->get('nome do troço')
        request->body() pega somente o dado q esta contido em body
        */

        $data = $request->all();
        $data['status'] = 'a'; //deixa A como default

        $support->create($data); // chama o model que esta criado no parametro (que habilita a criaçao de um registro)
        //... aqui eu tenho o objeto que foi inserido
        return redirect()->route('supports.index'); //depois de cadastrar retorna para pag de cadastro de novo
    }

}
