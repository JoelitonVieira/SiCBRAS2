<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1545005201ComposicaoGranulometricasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('composicao_granulometricas')) {
            Schema::create('composicao_granulometricas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('telas')->nullable();
                $table->double('maximo', 4, 2)->nullable();
                $table->double('minimo', 4, 2)->nullable();
                
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
        Schema::dropIfExists('composicao_granulometricas');
    }
}
