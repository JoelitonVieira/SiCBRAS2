<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1545004267ClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('clientes')) {
            Schema::create('clientes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nome_cliente')->nullable();
                $table->string('cpf')->nullable();
                $table->string('cnpj')->nullable();
                $table->string('email_cliente')->nullable();
                $table->string('telefone')->nullable();
                $table->string('cep_address')->nullable();
                $table->double('cep_latitude')->nullable();
                $table->double('cep_longitude')->nullable();
                
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
        Schema::dropIfExists('clientes');
    }
}
