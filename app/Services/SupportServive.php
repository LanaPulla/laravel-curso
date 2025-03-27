<?php 
/*AQUI NESSE ARQUIVO VAI FICAR o conjunto de regras, operações e processos que definem o um sistema deve funcionar
TIPO: Política de cancelamento e reembolso,Cálculo do valor total da reserva 
com base na temporada,Taxas aplicadas em determinadas transações, Classificação 
e Categorias de Dúvidas, enviar email etc
*/

namespace App\Services;

use stdClass;

class SupportService{

    protected $repository;

    public function __construct(){
        
    }


    public function getAll(string $filter = null): array { //: array = para retornar somente array

        return $this->repository->getAll($filter);
    }


    public function findOne(string $id): stdClass|null { //stdClass = retorna algo sem propriedades ou métodos definidos
        return $this->repository->findOne($id);
    }


    public function new(string $subject, string $status, string $body): stdClass{
       return $this->repository->new($subject, $status, $body);
    }
 

    public function update(string $id, string $subject, string $status, string $body): stdClass|null{
        return $this->repository->update($id, $subject, $status, $body);
    }
    

    public function delete(string $id): void{
        $this->repository->delete($id);
    }

}

