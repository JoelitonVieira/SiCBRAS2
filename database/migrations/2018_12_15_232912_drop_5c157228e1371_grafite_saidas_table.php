<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5c157228e1371GrafiteSaidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('grafite_saidas');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('grafite_saidas')) {
            Schema::create('grafite_saidas', function (Blueprint $table) {
                $table->increments('id');
                $table->date('data')->nullable();
                $table->string('nome_lider')->nullable();
                $table->string('forno')->nullable();
                $table->integer('operacao')->nullable();
                $table->string('saida')->nullable();
                $table->string('umidade')->nullable();
                $table->string('quantidade_real')->nullable();
                $table->string('saida_acumulada')->nullable();
                $table->string('observacoes')->nullable();
                $table->string('quantidade_bags')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

            $table->index(['deleted_at']);
            });
        }
    }
}
