<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c1579541efadRelationshipsToTreinamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('treinamentos', function(Blueprint $table) {
            if (!Schema::hasColumn('treinamentos', 'nome_treinamento_id')) {
                $table->integer('nome_treinamento_id')->unsigned()->nullable();
                $table->foreign('nome_treinamento_id', '241552_5c157722df06c')->references('id')->on('turmas')->onDelete('cascade');
                }
                if (!Schema::hasColumn('treinamentos', 'nome_setores_id')) {
                $table->integer('nome_setores_id')->unsigned()->nullable();
                $table->foreign('nome_setores_id', '241552_5c1577230d62c')->references('id')->on('setores')->onDelete('cascade');
                }
                if (!Schema::hasColumn('treinamentos', 'instrutor_id')) {
                $table->integer('instrutor_id')->unsigned()->nullable();
                $table->foreign('instrutor_id', '241552_5c1577232984f')->references('id')->on('funcionarios')->onDelete('cascade');
                }
                if (!Schema::hasColumn('treinamentos', 'tipo_treinamento_id')) {
                $table->integer('tipo_treinamento_id')->unsigned()->nullable();
                $table->foreign('tipo_treinamento_id', '241552_5c1577234413f')->references('id')->on('tipo_de_treinamentos')->onDelete('cascade');
                }
                if (!Schema::hasColumn('treinamentos', 'espec_treinamento_id')) {
                $table->integer('espec_treinamento_id')->unsigned()->nullable();
                $table->foreign('espec_treinamento_id', '241552_5c1577236061f')->references('id')->on('espec_treinamentos')->onDelete('cascade');
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
        Schema::table('treinamentos', function(Blueprint $table) {
            
        });
    }
}
