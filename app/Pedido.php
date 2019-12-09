<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PedidoProduto;

class Pedido extends Model
{
    protected $fillable = [
        'user_id',
        'cliente_id',
        'status'
    ];

    public function pedido_produtos()
    {
        return $this->hasMany('App\PedidoProduto')
            ->select( \DB::raw('id, produto_id, sum(desconto) as descontos, sum(valor) as valores, count(1) as qtd') )
            ->groupBy('id')
            ->orderBy('id', 'desc');
    }

    public function pedido_total($idpedido)
    {
        $result = \DB::table('pedido_produtos')
        ->select(\DB::raw('sum(valor_real) as Total'))
        ->where('pedido_id', $idpedido)
        ->groupBy('pedido_id')
        ->get();
        
        return $result;
    }

    public function pedido_produtos_itens()
    {
        return $this->hasMany('App\PedidoProduto');
    }

    public function pedidoCliente()
    {
        return $this->belongsTo('App\Cliente', 'cliente_id', 'id');
    }

    public static function consultaId($where)
    {
        $pedido = self::where($where)->first(['id']);
        return !empty($pedido->id) ? $pedido->id : null;
    }
}
