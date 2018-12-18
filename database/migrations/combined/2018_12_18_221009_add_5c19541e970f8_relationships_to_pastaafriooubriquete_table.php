<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c19541e970f8RelationshipsToPastaAFrioOuBriqueteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pasta_a_frio_ou_briquetes', function(Blueprint $table) {
            if (!Schema::hasColumn('pasta_a_frio_ou_briquetes', 'fornecedor_id')) {
                $table->integer('fornecedor_id')->unsigned()->nullable();
                $table->foreign('fornecedor_id', '241546_5c157d67c36c0')->references('id')->on('fornecedors')->onDelete('cascade');
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
        Schema::table('pasta_a_frio_ou_briquetes', function(Blueprint $table) {
            if(Schema::hasColumn('pasta_a_frio_ou_briquetes', 'fornecedor_id')) {
                $table->dropForeign('241546_5c157d67c36c0');
                $table->dropIndex('241546_5c157d67c36c0');
                $table->dropColumn('fornecedor_id');
            }
            
        });
    }
}
