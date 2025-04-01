<?php 

namespace App\Repositories;

interface PaginationInterface{

    public function items(): array;
    public function total():int;
    public function ifFirstPage():bool;
    public function ifLastPage():bool;
    public function currentPage():int;
    public function getNumberNextPage():int;
    public function getNumberPreviousPage():int;

}
