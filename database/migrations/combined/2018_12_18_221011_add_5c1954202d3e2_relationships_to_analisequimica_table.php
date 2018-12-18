<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c1954202d3e2RelationshipsToAnaliseQuimicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('analise_quimicas', function(Blueprint $table) {
            if (!Schema::hasColumn('analise_quimicas', 'fk_solicitar_amostra_id')) {
                $table->integer('fk_solicitar_amostra_id')->unsigned()->nullable();
                $table->foreign('fk_solicitar_amostra_id', '241822_5c16f3fb86e04')->references('id')->on('solicitar_amostras')->onDelete('cascade');
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
        Schema::table('analise_quimicas', function(Blueprint $table) {
            if(Schema::hasColumn('analise_quimicas', 'fk_solicitar_amostra_id')) {
                $table->dropForeign('241822_5c16f3fb86e04');
                $table->dropIndex('241822_5c16f3fb86e04');
                $table->dropColumn('fk_solicitar_amostra_id');
            }
            
        });
    }
}
