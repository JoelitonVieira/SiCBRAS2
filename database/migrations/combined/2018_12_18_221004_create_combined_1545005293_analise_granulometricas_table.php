<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1545005293AnaliseGranulometricasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('analise_granulometricas')) {
            Schema::create('analise_granulometricas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('resultados_penr')->nullable();
                $table->datetime('data')->nullable();
                $table->string('status')->nullable();
                $table->string('destino_address')->nullable();
                $table->double('destino_latitude')->nullable();
                $table->double('destino_longitude')->nullable();
                
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
        Schema::dropIfExists('analise_granulometricas');
    }
}
