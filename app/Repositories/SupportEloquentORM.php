<?php

namespace App\Repositories;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Models\Support;
use App\Repositories\SupportRepositoryInterface;
use Illuminate\Pagination\Paginator;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface{


    public function __construct(protected Support $model){
        
    }

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface { //funcao para paginaçao 
        $result =  $this->model
                    ->where(function ($query) use ($filter){ //funcao de callback para procurar e pegar todos por meio do filtro 
                    if($filter){
                        $query->where('subject', $filter);//aqui para procurar o subject igual
                        $query->orWhere('body', 'like', "%{$filter}%"); //% e { pra procurar a palavra tanto no inicio quanto no final 
                    }
                })
                    ->paginate($totalPerPage,['*'], 'page',  $page ) ;  //paginate vai definir a pag, primeiro quantos itens por pag vai ter, segundo quais colunas do filtro, e qual pag que é
                return new PaginationPresenter($result);
    }



    public function getAll(string $filter = null): array{
        return $this->model
                    ->where(function ($query) use ($filter){ //funcao de callback para procurar e pegar todos por meio do filtro 
                        if($filter){
                           $query->where('subject', $filter);//aqui para procurar o subject igual
                           $query->orWhere('body', 'like', "%{$filter}%"); //% e { pra procurar a palavra tanto no inicio quanto no final 
                        }
                    })
                    ->get()   //->all() quando se usa where em cima, deve-se usar get() embaixo
                    ->toArray(); // retornando um array
    }




    public function findOne(string $id): stdClass|null{

        $support = $this->model->find($id);//achar pelo id com a var $support de outra class 
        if(!$support){
            return null;//se nao achar é null 
        }
        return (object)$support->toArray();//se achar transforma o array em objeto stdClass
    }



    public function delete(string $id): void{
        $this->model->findOrFail($id)->delete(); //findOrFail vai tentar achar pelo id, se nao achar da um exception
    }




    public function new(CreateSupportDTO $dto): stdClass{

        $support = $this->model->create((array) $dto);

        return (object) $support->toArray(); //se achar transforma o $dto em objeto array stdClass e cria outro 

    }



    public function update(UpdateSupportDTO $dto): stdClass|null{
       if(!$support = $this->model->find($dto->id)){
            return null;
       }

       $support->update((array) $dto);

       return (object) $support->toArray();
    }


}