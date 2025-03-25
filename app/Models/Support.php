<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory; //habilita o uso das factories (fabricas de dados) para criaçaõ de dados falsos automaticamente para testes

    protected $fillable = [ //propriedade q define quais colunas podem ser preenchidas por um array quando houver um cadastro 
        'subject',
        'body',
        'status'
    ];
}
