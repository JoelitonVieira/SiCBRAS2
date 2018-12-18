<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5c15722363a8bCoqueSaidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('coque_saidas');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('coque_saidas')) {
            Schema::create('coque_saidas', function (Blueprint $table) {
                $table->increments('id');
                $table->date('data')->nullable();
                $table->string('lider')->nullable();
                $table->string('forno')->nullable();
                $table->string('saida')->nullable();
                $table->string('saida_acumulada')->nullable();
                $table->string('observacao')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

            $table->index(['deleted_at']);
            });
        }
    }
}
