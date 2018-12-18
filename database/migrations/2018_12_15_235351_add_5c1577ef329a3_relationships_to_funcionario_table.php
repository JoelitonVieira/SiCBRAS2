<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c1577ef329a3RelationshipsToFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionarios', function(Blueprint $table) {
            if (!Schema::hasColumn('funcionarios', 'nome_cargo_id')) {
                $table->integer('nome_cargo_id')->unsigned()->nullable();
                $table->foreign('nome_cargo_id', '241531_5c1577ed31e09')->references('id')->on('cargos')->onDelete('cascade');
                }
                if (!Schema::hasColumn('funcionarios', 'nome_departamento_id')) {
                $table->integer('nome_departamento_id')->unsigned()->nullable();
                $table->foreign('nome_departamento_id', '241531_5c1577ed4da23')->references('id')->on('departamentos')->onDelete('cascade');
                }
                if (!Schema::hasColumn('funcionarios', 'nome_setor_id')) {
                $table->integer('nome_setor_id')->unsigned()->nullable();
                $table->foreign('nome_setor_id', '241531_5c1577ed67de3')->references('id')->on('setores')->onDelete('cascade');
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
        Schema::table('funcionarios', function(Blueprint $table) {
            
        });
    }
}
