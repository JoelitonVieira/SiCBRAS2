<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1544909714PastaAFrioOuBriquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('pasta_a_frio_ou_briquetes')) {
            Schema::create('pasta_a_frio_ou_briquetes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('materia_prima')->nullable();
                $table->date('data')->nullable();
                $table->string('num_nf')->nullable();
                $table->string('transportadora')->nullable();
                $table->string('quantidade')->nullable();
                $table->string('entrada_acumulada')->nullable();
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
        Schema::dropIfExists('pasta_a_frio_ou_briquetes');
    }
}
