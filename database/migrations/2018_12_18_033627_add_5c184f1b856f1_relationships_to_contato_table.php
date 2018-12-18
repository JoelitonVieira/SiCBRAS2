<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c184f1b856f1RelationshipsToContatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contatos', function(Blueprint $table) {
            if (!Schema::hasColumn('contatos', 'nome_cliente_id')) {
                $table->integer('nome_cliente_id')->unsigned()->nullable();
                $table->foreign('nome_cliente_id', '241824_5c16efc383774')->references('id')->on('clientes')->onDelete('cascade');
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
        Schema::table('contatos', function(Blueprint $table) {
            
        });
    }
}
