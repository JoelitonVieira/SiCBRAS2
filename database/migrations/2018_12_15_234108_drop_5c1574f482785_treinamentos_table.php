<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5c1574f482785TreinamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('treinamentos');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('treinamentos')) {
            Schema::create('treinamentos', function (Blueprint $table) {
                $table->increments('id');
                $table->time('carga_horaria')->nullable();
                $table->date('data_inicio')->nullable();
                $table->date('data_conclusao')->nullable();
                $table->integer('validadade')->nullable()->unsigned();
                $table->string('reciclagem')->nullable();
                $table->string('situacao_turma')->nullable();
                $table->string('localidade')->nullable();
                $table->string('disponibilidade')->nullable();
                $table->datetime('horas')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

            $table->index(['deleted_at']);
            });
        }
    }
}
