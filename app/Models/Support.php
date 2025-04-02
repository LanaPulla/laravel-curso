<?php

namespace App\Models;

use App\Enums\SupportStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory; //habilita o uso das factories (fabricas de dados) para criaçao de dados falsos automaticamente para testes

    protected $fillable = [ //propriedade q define quais colunas podem ser preenchidas por um array quando houver um cadastro 
        'subject',
        'body',
        'status'
    ];

    public function status(): Attribute{
        return Attribute::make(
            set: fn (SupportStatus $status) => $status->name,
        );
    }
}
