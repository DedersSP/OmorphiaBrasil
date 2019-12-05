<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigoProduto');
            $table->string('categoria');
            $table->string('subCategoria');
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->decimal('valor', 6, 2)->default(0);
            $table->integer('comissao');
            $table->string('imagem')->nullable();
            $table->enum('ativo', ['S', 'N'])->default('S');
            $table->enum('promocao', ['S', 'N'])->default('N');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
