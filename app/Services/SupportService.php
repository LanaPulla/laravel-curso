<?php 
/*AQUI NESSE ARQUIVO VAI FICAR o conjunto de regras, operações e processos que definem o um sistema deve funcionar
TIPO: Política de cancelamento e reembolso,Cálculo do valor total da reserva 
com base na temporada,Taxas aplicadas em determinadas transações, Classificação 
e Categorias de Dúvidas, enviar email etc
*/

namespace App\Services;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportService { //classe que vai levar os dados da repository para as outras class por meio de funcoes

  
    public function __construct( protected SupportRepositoryInterface $repository){ //construtor
    }

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null ) { 

        return $this->repository->paginate(page: $page, totalPerPage: $totalPerPage, filter: $filter) ; 
    }

    
    public function getAll(string $filter = null): array { //: array = para retornar somente array. 

        return $this->repository->getAll($filter); //Metodo para retornar todos os dados do bd
    }


    public function findOne(string $id): stdClass|null { //stdClass = retorna algo sem propriedades ou métodos definidos
        return $this->repository->findOne($id); //metodo para achar somente uma coisa pelo id
    }


    public function new(CreateSupportDTO $dto): stdClass{
       return $this->repository->new($dto);//funcao para criar uma nova solicitaçao
    } 
 

    public function update(UpdateSupportDTO $dto): stdClass|null{
        return $this->repository->update($dto); //funcao para atualizar os dados de algo 
    }
    

    public function delete(string $id): void{
        $this->repository->delete($id); //funcao para deletar 
    }

}

