<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1544906866MisturaNovasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('mistura_novas')) {
            Schema::create('mistura_novas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('data')->nullable();
                $table->string('numero_cf')->nullable();
                $table->string('numero_kf')->nullable();
                $table->string('kg_coquebase')->nullable();
                $table->string('kg_areiabase')->nullable();
                $table->string('kg_coquereal')->nullable();
                $table->string('kg_areiareal')->nullable();
                $table->string('mediacoque')->nullable();
                $table->string('mediaareia')->nullable();
                $table->string('num_batelada')->nullable();
                $table->string('turnos')->nullable();
                $table->string('coque_total')->nullable();
                $table->string('areia_total')->nullable();
                $table->string('total_batelada')->nullable();
                $table->string('total_misturadia')->nullable();
                $table->string('mistura_total')->nullable();
                
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
        Schema::dropIfExists('mistura_novas');
    }
}
