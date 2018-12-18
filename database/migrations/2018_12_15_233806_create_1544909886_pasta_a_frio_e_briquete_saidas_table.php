<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1544909886PastaAFrioEBriqueteSaidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('pasta_a_frio_e_briquete_saidas')) {
            Schema::create('pasta_a_frio_e_briquete_saidas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('materia_prima')->nullable();
                $table->date('data')->nullable();
                $table->string('lider_saida')->nullable();
                $table->string('forno_saida')->nullable();
                $table->string('operacao')->nullable();
                $table->string('saida')->nullable();
                $table->string('saida_acumulada')->nullable();
                $table->string('observacoes')->nullable();
                
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
        Schema::dropIfExists('pasta_a_frio_e_briquete_saidas');
    }
}
