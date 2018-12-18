<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1544909740AreiaSaidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('areia_saidas')) {
            Schema::create('areia_saidas', function (Blueprint $table) {
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areia_saidas');
    }
}
