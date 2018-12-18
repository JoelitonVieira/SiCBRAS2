<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c16f379c7528RelationshipsToResultadosFisicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resultados_fisicos', function(Blueprint $table) {
            if (!Schema::hasColumn('resultados_fisicos', 'nr_analise_id')) {
                $table->integer('nr_analise_id')->unsigned()->nullable();
                $table->foreign('nr_analise_id', '241818_5c16f378352b7')->references('id')->on('analise_granulometricas')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resultados_fisicos', function(Blueprint $table) {
            
        });
    }
}
