<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1544906965SolicitacaoDeAnalisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('solicitacao_de_analises')) {
            Schema::create('solicitacao_de_analises', function (Blueprint $table) {
                $table->increments('id');
                $table->string('turnos')->nullable();
                $table->string('nome_resp_amostragem')->nullable();
                $table->string('mat_primas')->nullable();
                $table->string('lote_ano')->nullable();
                $table->string('tipos_graf')->nullable();
                $table->integer('n_op')->nullable();
                $table->string('forno')->nullable();
                $table->string('origem')->nullable();
                $table->string('tipos_de_misturas')->nullable();
                $table->string('numero_operacao')->nullable();
                $table->string('fornos_das_misturas')->nullable();
                $table->string('amostra_teste')->nullable();
                $table->string('material')->nullable();
                $table->string('identificacao_da_amostra')->nullable();
                
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
        Schema::dropIfExists('solicitacao_de_analises');
    }
}
