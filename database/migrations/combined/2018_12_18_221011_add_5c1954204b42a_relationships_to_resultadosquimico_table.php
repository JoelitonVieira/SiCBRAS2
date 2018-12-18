<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c1954204b42aRelationshipsToResultadosQuimicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resultados_quimicos', function(Blueprint $table) {
            if (!Schema::hasColumn('resultados_quimicos', 'n_analis_id')) {
                $table->integer('n_analis_id')->unsigned()->nullable();
                $table->foreign('n_analis_id', '241823_5c16f45e59e92')->references('id')->on('analise_quimicas')->onDelete('cascade');
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
        Schema::table('resultados_quimicos', function(Blueprint $table) {
            if(Schema::hasColumn('resultados_quimicos', 'n_analis_id')) {
                $table->dropForeign('241823_5c16f45e59e92');
                $table->dropIndex('241823_5c16f45e59e92');
                $table->dropColumn('n_analis_id');
            }
            
        });
    }
}
