<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'tipo',
        'cnpj',
        'cpf',
        'insEstadual',
        'fantasia',
        'razao',
        'cep',
        'endereco',
        'numero',
        'bairro',
        'complemento',
        'cidade',
        'estado',
        'responsavel',
        'cargo',
        'celular',
        'fixo',
        'email',
        'novidades',
        'whatsapp',
        'cabeleleiros',
        'Observacoes',
        'ativo',
        'user_id',
        'facebook',
        'instagram'
    ];

    public function clientePedido()
    {
        return $this->hasMany('App\Pedido');
    }

    
}
