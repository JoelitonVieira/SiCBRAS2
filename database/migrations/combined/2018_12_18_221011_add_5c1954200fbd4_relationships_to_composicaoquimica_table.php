<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c1954200fbd4RelationshipsToComposicaoQuimicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('composicao_quimicas', function(Blueprint $table) {
            if (!Schema::hasColumn('composicao_quimicas', 'cd_especificacao_id')) {
                $table->integer('cd_especificacao_id')->unsigned()->nullable();
                $table->foreign('cd_especificacao_id', '241821_5c16f3cb77b65')->references('id')->on('especificacaos')->onDelete('cascade');
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
        Schema::table('composicao_quimicas', function(Blueprint $table) {
            if(Schema::hasColumn('composicao_quimicas', 'cd_especificacao_id')) {
                $table->dropForeign('241821_5c16f3cb77b65');
                $table->dropIndex('241821_5c16f3cb77b65');
                $table->dropColumn('cd_especificacao_id');
            }
            
        });
    }
}
