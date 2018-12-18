<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5c1954206ee3dFuncionarioTreinamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('funcionario_treinamento')) {
            Schema::create('funcionario_treinamento', function (Blueprint $table) {
                $table->integer('funcionario_id')->unsigned()->nullable();
                $table->foreign('funcionario_id', 'fk_p_241531_241552_treina_5c1954206efe6')->references('id')->on('funcionarios')->onDelete('cascade');
                $table->integer('treinamento_id')->unsigned()->nullable();
                $table->foreign('treinamento_id', 'fk_p_241552_241531_funcio_5c1954206f081')->references('id')->on('treinamentos')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionario_treinamento');
    }
}
