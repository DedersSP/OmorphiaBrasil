<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'imagem',
        'valor',
        'ativo',
        'codigoProduto',
        'categoria',
        'subCategoria',
        'comissao',
        'promocao'
    ];
}
