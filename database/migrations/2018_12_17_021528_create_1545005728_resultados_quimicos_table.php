<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1545005728ResultadosQuimicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('resultados_quimicos')) {
            Schema::create('resultados_quimicos', function (Blueprint $table) {
                $table->increments('id');
                $table->datetime('data')->nullable();
                $table->string('op_forno')->nullable();
                $table->integer('quantidade')->nullable();
                $table->string('numeracao')->nullable();
                $table->double('sic_flourizado', 4, 2)->nullable();
                $table->double('sic', 4, 2)->nullable();
                $table->double('ppc', 4, 2)->nullable();
                $table->double('c_reagido', 4, 2)->nullable();
                $table->double('si_reagido', 4, 2)->nullable();
                $table->double('si_livre', 4, 2)->nullable();
                $table->double('sio2', 4, 2)->nullable();
                $table->double('si_sio2', 4, 2)->nullable();
                $table->double('fe2o3', 4, 2)->nullable();
                $table->double('al2o3', 4, 2)->nullable();
                $table->double('cao', 4, 2)->nullable();
                $table->double('mgo', 4, 2)->nullable();
                $table->string('observa')->nullable();
                $table->string('status')->nullable();
                $table->double('c_livgre', 4, 2)->nullable();
                
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
        Schema::dropIfExists('resultados_quimicos');
    }
}
