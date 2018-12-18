<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c19541ed60f9RelationshipsToSolicitacaoDeAnaliseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitacao_de_analises', function(Blueprint $table) {
            if (!Schema::hasColumn('solicitacao_de_analises', 'fornecedor_id')) {
                $table->integer('fornecedor_id')->unsigned()->nullable();
                $table->foreign('fornecedor_id', '241518_5c157ee4a00b4')->references('id')->on('fornecedors')->onDelete('cascade');
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
        Schema::table('solicitacao_de_analises', function(Blueprint $table) {
            if(Schema::hasColumn('solicitacao_de_analises', 'fornecedor_id')) {
                $table->dropForeign('241518_5c157ee4a00b4');
                $table->dropIndex('241518_5c157ee4a00b4');
                $table->dropColumn('fornecedor_id');
            }
            
        });
    }
}
