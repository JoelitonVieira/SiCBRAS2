<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1544909557CoquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('coques')) {
            Schema::create('coques', function (Blueprint $table) {
                $table->increments('id');
                $table->date('data_recebimento')->nullable();
                $table->date('data_expedicao')->nullable();
                $table->string('transportadora')->nullable();
                $table->double('nota_fiscal', 4, 2)->nullable();
                $table->integer('cte')->nullable();
                $table->string('peso_nf')->nullable();
                $table->double('peso_sicbras', 4, 2)->nullable();
                $table->double('diferenca', 4, 2)->nullable();
                $table->string('rs_acordo')->nullable();
                $table->string('cambio')->nullable();
                $table->string('dolar_acordo')->nullable();
                $table->double('valor_nota', 4, 2)->nullable();
                $table->string('rs_real_imposto')->nullable();
                $table->string('icms')->nullable();
                $table->double('pis_confins', 4, 2)->nullable();
                $table->string('ipi')->nullable();
                $table->string('encargo_30')->nullable();
                $table->string('rs_real_semimposto')->nullable();
                $table->string('dolar_sem_imposto')->nullable();
                $table->double('valor_frete', 4, 2)->nullable();
                $table->double('rs_frete', 4, 2)->nullable();
                $table->string('saldo_retirar')->nullable();
                
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
        Schema::dropIfExists('coques');
    }
}
