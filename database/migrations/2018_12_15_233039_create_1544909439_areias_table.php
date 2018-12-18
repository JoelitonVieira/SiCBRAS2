<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1544909439AreiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('areias')) {
            Schema::create('areias', function (Blueprint $table) {
                $table->increments('id');
                $table->date('data')->nullable();
                $table->string('num_nf')->nullable();
                $table->integer('cte')->nullable();
                $table->string('peso_nf')->nullable();
                $table->string('peso_sicbras')->nullable();
                $table->string('diferenca')->nullable();
                $table->string('valor_prod')->nullable();
                $table->string('valor_frete')->nullable();
                $table->string('rs_areia')->nullable();
                $table->string('rs_frete')->nullable();
                $table->double('saldo_retirar', 4, 2)->nullable();
                
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
        Schema::dropIfExists('areias');
    }
}
