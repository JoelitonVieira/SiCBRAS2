<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1545005591ComposicaoQuimicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('composicao_quimicas')) {
            Schema::create('composicao_quimicas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('comp')->nullable();
                $table->double('max', 4, 2)->nullable();
                $table->double('minimo', 4, 2)->nullable();
                
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
        Schema::dropIfExists('composicao_quimicas');
    }
}
