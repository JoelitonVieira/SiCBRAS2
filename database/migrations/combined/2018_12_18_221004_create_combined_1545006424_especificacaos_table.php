<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1545006424EspecificacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('especificacaos')) {
            Schema::create('especificacaos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('codigo')->nullable();
                $table->datetime('data')->nullable();
                $table->string('requisito_iso')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especificacaos');
    }
}
