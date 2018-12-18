<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1545004689SolicitarAmostrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('solicitar_amostras')) {
            Schema::create('solicitar_amostras', function (Blueprint $table) {
                $table->increments('id');
                $table->string('setor')->nullable();
                $table->datetime('data')->nullable();
                $table->string('equipamento')->nullable();
                $table->string('amostra')->nullable();
                $table->string('responsavel')->nullable();
                $table->string('referencia')->nullable();
                $table->string('alimentacao')->nullable();
                $table->string('od_producao')->nullable();
                $table->string('bag_pallet')->nullable();
                $table->integer('peso')->nullable();
                
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
        Schema::dropIfExists('solicitar_amostras');
    }
}
