<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
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
        return view('admin/supports/create'); //retornando a pag de formulario
    }

    public function store(StoreUpdateSupport $request, Support $support){ //cria o objeto e coloca dentro da variavel o resquest, para a var acessar os dados de request

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

    public function edit(Support $support, string|int $id){ //recebe por parametro um id string OU int na var $id

        if(!$support = $support->where('id', $id)->first()){ //se o id for null... (procure na coluna id e guarde no $id)
            return back(); //... ele vai voltar para pag que o usuario tava antes 
        }
        
        return view('admin/supports.edit', compact('support'));
    }

    public function update(Request $request, Support $support, string $id){ //metodo para atualizar dados da pag edit

        if(!$support = $support->find($id)){ //novamente se for null volta para pag anterior
            return back();
        };
        

        $support->update($request->only([ //se nao for nulo support é atualizado com todos os dados q vem da request, mas somente no subject e no body 
            'subject', 'body'
        ]));
       
        return redirect()->route('supports.index'); //acabou volta para a pag cm todos os supports

    }

    public function detroy(string|int $id){ //metodo para excluir um dado da tabela 

        if(!$support = Support::find($id)){ //ja cria a var aqui e valida se é null ou nao
            return back(); 
        }
        
        $support->delete(); //o support é deletado

        return redirect()->route('supports.index');//volta para a pag indexapos excluir 
    }

}
