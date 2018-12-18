<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c157e3ecc1abRelationshipsToGrafiteSaidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grafite_saidas', function(Blueprint $table) {
            if (!Schema::hasColumn('grafite_saidas', 'fornecedor_id')) {
                $table->integer('fornecedor_id')->unsigned()->nullable();
                $table->foreign('fornecedor_id', '241549_5c157e3d0c8fa')->references('id')->on('fornecedors')->onDelete('cascade');
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
        Schema::table('grafite_saidas', function(Blueprint $table) {
            
        });
    }
}
