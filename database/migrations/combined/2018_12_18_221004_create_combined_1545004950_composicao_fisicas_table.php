<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1545004950ComposicaoFisicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('composicao_fisicas')) {
            Schema::create('composicao_fisicas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('granulometria')->nullable();
                $table->string('maximo')->nullable();
                $table->string('minimo')->nullable();
                
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
        Schema::dropIfExists('composicao_fisicas');
    }
}
