<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('supports', function (Blueprint $table) { //criando a tabela da pag dos support
            $table->id();
            $table->string('subject'); //assunto da tabela(somente caracter)
            $table->enum('status', ['a', 'p', 'c']); //status ativo, pendente, concluido
            $table->text('body');//espaço com caracter e numero 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
