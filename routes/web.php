<?php

use App\Http\Controllers\Admin\{SupportController}; //{} para usar o mesmo namespace dps
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

/*
route:: = define o tipo de rota http
('supports/create') = define o url da pag
, [SupportController::class, 'store']) = Define o controlador e o método (store) que serão executados quando essa rota for chamada
->name('supports.store') = no codigo para se referir a essa rota é usado o nome e nao o url
*/
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
//create precisa estar acima do {id} se nao ele vai entrar como id e nao como rota 

Route::get('/supports/{id}' , [SupportController::class, 'show'])->name('supports.show');

Route::post('/supports', [SupportController::class, 'store'])->name('supports.store');
//cria uma rota post para ser usada no formulario da pag create de duvidas

Route::get('/supports', [SupportController::class, 'index'])->name('supports.index'); //colocando o nome pois se alterar a rota dps, o sistema fica intacto onde é usado o nome 

Route::get('/contato', [SiteController::class, 'contact']); // aqui é para ficar só as routes, sem return como em "return view('welcome');", isso o controller que faz
//passando em um array o arquivo, e acessa a classe com o metodo contact q retorna a view


Route::get('/', function () {
    return view('welcome');
});
