<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function __construct(protected SupportService $service){

    }


    public function index(Request $request){ //pega o objeto e coloca dentro da variavel. O request captura os dados que vem uma solicita http geralmente feita por um usuario

        $supports =  $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 15),
            filter: $request->filter,
        );//aqui eu tenho um array de dados vindo da service QUE BUSCA OS DADOS

        return view('admin/supports/index', compact('supports', )); //retornar a pag quando o metodo for chamado e retorna o support com os dados da tabela
        //compac criou um array com o mesmo valor da var supports e retornou ele 
    } 



    public function show(string $id){

        //posso retornar valores com o Support::find($id) ou Support::where('id', '=' '$id')->first()

        if(!$support = $this->service->findOne($id)){ //se o id for null... 
            return back(); //... ele vai voltar para pag que o usuario tava antes 
        }
        
        return view('admin/supports/show', compact('support')); //retorna a pag com id clicado pelo usuario com os dados procurados pela var 'support'
    }




    public function create(){
        return view('admin/supports/create'); //retornando a pag de formulario
    }



    public function store(StoreUpdateSupport $request, Support $support){ //cria o objeto e coloca dentro da variavel o resquest, para a var acessar os dados de request

        /* Request $request
        request tem varios metodos, como:
        request->all() q pega todo
        request->only(nome da coluna na tabela ex: 'subjetc') OU request->get('nome do troço')
        request->body() pega somente o dado q esta contido em body
        */

        $this->service->new(CreateSupportDTO::makeFromRequest($request)); //chama o metodo da DTO para criar um novo usuario

        return redirect()->route('supports.index'); //depois de cadastrar retorna para pag de cadastro de novo
    }



    public function edit(string|int $id){ //recebe por parametro um id string OU int na var $id

       // if(!$support = $support->where('id', $id)->first()){ se o id for null... (procure na coluna id e guarde no $id)
       
       if(!$support = $this->service->findOne($id)){
       return back(); //... ele vai voltar para pag que o usuario tava antes 
       }
        
        return view('admin/supports.edit', compact('support'));
    }



    public function update(StoreUpdateSupport $request, Support $support, string $id){ //metodo para atualizar dados da pag edit

        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request)); //chama o metodo da DTO para atualizar um  usuario
       
        if(!$support){ //se o id for null... 
            return back(); //... ele vai voltar para pag que o usuario tava antes 
        }

        return redirect()->route('supports.index'); //acabou volta para a pag cm todos os supports
    }



    public function detroy(string $id){ //metodo para excluir um dado da tabela 

        $this->service->delete($id);

        return redirect()->route('supports.index');//volta para a pag indexapos excluir 
    }

}
