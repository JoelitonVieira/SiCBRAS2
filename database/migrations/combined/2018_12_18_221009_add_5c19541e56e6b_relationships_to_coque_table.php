<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c19541e56e6bRelationshipsToCoqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coques', function(Blueprint $table) {
            if (!Schema::hasColumn('coques', 'fornecedor_id')) {
                $table->integer('fornecedor_id')->unsigned()->nullable();
                $table->foreign('fornecedor_id', '241544_5c157cb6ca79b')->references('id')->on('fornecedors')->onDelete('cascade');
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
        Schema::table('coques', function(Blueprint $table) {
            if(Schema::hasColumn('coques', 'fornecedor_id')) {
                $table->dropForeign('241544_5c157cb6ca79b');
                $table->dropIndex('241544_5c157cb6ca79b');
                $table->dropColumn('fornecedor_id');
            }
            
        });
    }
}
