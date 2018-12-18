<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c19541e33cdfRelationshipsToAreiumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('areias', function(Blueprint $table) {
            if (!Schema::hasColumn('areias', 'fornecedor_id')) {
                $table->integer('fornecedor_id')->unsigned()->nullable();
                $table->foreign('fornecedor_id', '241543_5c157c529aeb2')->references('id')->on('fornecedors')->onDelete('cascade');
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
        Schema::table('areias', function(Blueprint $table) {
            if(Schema::hasColumn('areias', 'fornecedor_id')) {
                $table->dropForeign('241543_5c157c529aeb2');
                $table->dropIndex('241543_5c157c529aeb2');
                $table->dropColumn('fornecedor_id');
            }
            
        });
    }
}
