<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c19541f02d6aRelationshipsToContatoTable extends Migration
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
            if(Schema::hasColumn('contatos', 'nome_cliente_id')) {
                $table->dropForeign('241824_5c16efc383774');
                $table->dropIndex('241824_5c16efc383774');
                $table->dropColumn('nome_cliente_id');
            }
            
        });
    }
}
