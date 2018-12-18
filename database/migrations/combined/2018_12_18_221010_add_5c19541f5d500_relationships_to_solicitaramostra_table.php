<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c19541f5d500RelationshipsToSolicitarAmostraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitar_amostras', function(Blueprint $table) {
            if (!Schema::hasColumn('solicitar_amostras', 'cd_especificacao_id')) {
                $table->integer('cd_especificacao_id')->unsigned()->nullable();
                $table->foreign('cd_especificacao_id', '241813_5c16f26f78e44')->references('id')->on('especificacaos')->onDelete('cascade');
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
        Schema::table('solicitar_amostras', function(Blueprint $table) {
            if(Schema::hasColumn('solicitar_amostras', 'cd_especificacao_id')) {
                $table->dropForeign('241813_5c16f26f78e44');
                $table->dropIndex('241813_5c16f26f78e44');
                $table->dropColumn('cd_especificacao_id');
            }
            
        });
    }
}
