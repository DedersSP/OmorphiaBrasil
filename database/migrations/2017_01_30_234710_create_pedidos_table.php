<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); // unsigned: somente inteiros positivos
            $table->integer('cliente_id')->unsigned(); // unsigned: somente inteiros positivos
            $table->enum('status', ['RE', 'PA', 'CA']); // Reservado, Pago, Cancelado
            $table->string('status_pg')->nullable();
            $table->string('meio_pg')->nullable();
            $table->string('comprovante')->nullable();
            $table->string('file')->nullable();
            $table->string('status_entrega')->default('P');
            $table->date('data_entrega')->nullable();
            $table->string('recebedor')->nullable();
            $table->text('obs')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
