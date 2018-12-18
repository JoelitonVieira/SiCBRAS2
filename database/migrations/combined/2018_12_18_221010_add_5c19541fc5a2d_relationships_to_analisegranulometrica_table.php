<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c19541fc5a2dRelationshipsToAnaliseGranulometricaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('analise_granulometricas', function(Blueprint $table) {
            if (!Schema::hasColumn('analise_granulometricas', 'fk_solicitar_amostrar_id')) {
                $table->integer('fk_solicitar_amostrar_id')->unsigned()->nullable();
                $table->foreign('fk_solicitar_amostrar_id', '241817_5c16f34b0a5fa')->references('id')->on('solicitar_amostras')->onDelete('cascade');
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
        Schema::table('analise_granulometricas', function(Blueprint $table) {
            if(Schema::hasColumn('analise_granulometricas', 'fk_solicitar_amostrar_id')) {
                $table->dropForeign('241817_5c16f34b0a5fa');
                $table->dropIndex('241817_5c16f34b0a5fa');
                $table->dropColumn('fk_solicitar_amostrar_id');
            }
            
        });
    }
}
