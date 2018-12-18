<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1544908722FuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('funcionarios')) {
            Schema::create('funcionarios', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('numero_matricula')->nullable()->unsigned();
                $table->string('nome_funcionario')->nullable();
                $table->string('instrutor')->nullable();
                $table->string('situacao')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('funcionarios');
    }
}
