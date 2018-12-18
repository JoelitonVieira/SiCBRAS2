<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c157d1ebb252RelationshipsToGrafiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grafites', function(Blueprint $table) {
            if (!Schema::hasColumn('grafites', 'fornecedor_id')) {
                $table->integer('fornecedor_id')->unsigned()->nullable();
                $table->foreign('fornecedor_id', '241545_5c157d1cf1b37')->references('id')->on('fornecedors')->onDelete('cascade');
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
        Schema::table('grafites', function(Blueprint $table) {
            
        });
    }
}
