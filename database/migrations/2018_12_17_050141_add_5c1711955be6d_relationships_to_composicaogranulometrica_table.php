<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c1711955be6dRelationshipsToComposicaoGranulometricaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('composicao_granulometricas', function(Blueprint $table) {
            if (!Schema::hasColumn('composicao_granulometricas', 'cd_especificacao_id')) {
                $table->integer('cd_especificacao_id')->unsigned()->nullable();
                $table->foreign('cd_especificacao_id', '241816_5c16f2d53f5c2')->references('id')->on('especificacaos')->onDelete('cascade');
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
        Schema::table('composicao_granulometricas', function(Blueprint $table) {
            
        });
    }
}
