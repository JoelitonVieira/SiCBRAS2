<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1545005364ResultadosFisicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('resultados_fisicos')) {
            Schema::create('resultados_fisicos', function (Blueprint $table) {
                $table->increments('id');
                $table->double('resultado_pesado', 4, 2)->nullable();
                $table->double('resultado_encontrado', 4, 2)->nullable();
                
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
        Schema::dropIfExists('resultados_fisicos');
    }
}
