<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('tipo');
            $table->string('cnpj')->nullable();
            $table->string('cpf')->nullable();
            $table->string('insEstadual')->nullable();
            $table->string('fantasia');
            $table->string('razao')->nullable();
            $table->string('cep')->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('complemento')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('responsavel')->nullable();
            $table->string('cargo')->nullable();
            $table->string('celular')->nullable();
            $table->string('fixo')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('novidades')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('cabeleleiros')->nullable();
            $table->longText('Observacoes')->nullable();
            $table->enum('ativo', ['S', 'N'])->default('S');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
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
