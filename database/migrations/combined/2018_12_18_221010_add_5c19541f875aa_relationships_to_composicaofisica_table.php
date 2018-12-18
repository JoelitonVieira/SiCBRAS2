<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c19541f875aaRelationshipsToComposicaoFisicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('composicao_fisicas', function(Blueprint $table) {
            if (!Schema::hasColumn('composicao_fisicas', 'cd_especificacao_id')) {
                $table->integer('cd_especificacao_id')->unsigned()->nullable();
                $table->foreign('cd_especificacao_id', '241815_5c16f2984e3da')->references('id')->on('especificacaos')->onDelete('cascade');
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
        Schema::table('composicao_fisicas', function(Blueprint $table) {
            if(Schema::hasColumn('composicao_fisicas', 'cd_especificacao_id')) {
                $table->dropForeign('241815_5c16f2984e3da');
                $table->dropIndex('241815_5c16f2984e3da');
                $table->dropColumn('cd_especificacao_id');
            }
            
        });
    }
}
