<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1544909671GrafitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('grafites')) {
            Schema::create('grafites', function (Blueprint $table) {
                $table->increments('id');
                $table->date('data')->nullable();
                $table->string('nota_fiscal')->nullable();
                $table->string('transportadora')->nullable();
                $table->string('forno')->nullable();
                $table->integer('operacao')->nullable();
                $table->string('quantidade')->nullable();
                $table->string('umidade')->nullable();
                $table->string('quantidade_real')->nullable();
                $table->string('entrada_acumulada')->nullable();
                $table->string('observacoes')->nullable();
                $table->string('quantidade_bags')->nullable();
                
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
        Schema::dropIfExists('grafites');
    }
}
