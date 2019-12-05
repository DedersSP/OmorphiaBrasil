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
            $table->string('cep');
            $table->string('endereco');
            $table->string('numero');
            $table->string('bairro');
            $table->string('complemento')->nullable();
            $table->string('cidade');
            $table->string('estado');
            $table->string('responsavel');
            $table->string('cargo');
            $table->string('celular');
            $table->string('fixo')->nullable();
            $table->string('email');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('novidades');
            $table->string('whatsapp');
            $table->string('cabeleleiros');
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
