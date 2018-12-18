<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c16f130e0eaaRelationshipsToEspecificacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('especificacaos', function(Blueprint $table) {
            if (!Schema::hasColumn('especificacaos', 'nome_cliente_id')) {
                $table->integer('nome_cliente_id')->unsigned()->nullable();
                $table->foreign('nome_cliente_id', '241825_5c16f12f0b9a6')->references('id')->on('clientes')->onDelete('cascade');
                }
                if (!Schema::hasColumn('especificacaos', 'cd_produto_id')) {
                $table->integer('cd_produto_id')->unsigned()->nullable();
                $table->foreign('cd_produto_id', '241825_5c16f12f1e48f')->references('id')->on('produtos')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('especificacaos', function(Blueprint $table) {
            
        });
    }
}
