@extends('layout')
@section('pagina_titulo', 'Carrinho' )

@section('pagina_conteudo')

<div class="container">
    <div class="row">
        <h3>Produtos no carrinho</h3>
        <hr/>
        @if (Session::has('mensagem-sucesso'))
            <div class="card-panel green">
                <strong>{{ Session::get('mensagem-sucesso') }}</strong>
            </div>
        @endif
        @if (Session::has('mensagem-falha'))
            <div class="card-panel red">
                <strong>{{ Session::get('mensagem-falha') }}</strong>
            </div>
        @endif
        @forelse ($pedidos as $pedido)
            <h5 class="col l4 s12 m4"> Pedido: {{ $pedido->id }} </h5>
            <h5 class="col l4 s12 m4">Cliente: {{$pedido->pedidoCliente->id}} - {{$pedido->pedidoCliente->fantasia}}</h5>
            <h6 class="col l12 s12 m12"> Criado em: {{ $pedido->created_at->format('d/m/Y H:i') }} </h6>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Qtd</th>
                        <th>Produto</th>
                        <th>Valor Unit.</th>
                        <th>Bonificação $</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_pedido = 0;
                    @endphp
                    @foreach ($pedido->pedido_produtos as $pedido_produto)

                    <tr>
                        <td>
                            <img width="100" height="100" src="{{ $pedido_produto->produto->imagem }}">
                        </td>
                        <td class="center-align">
                            <div class="center-align">
                                <a class="col l4 m4 s4" href="#" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 1 )">
                                    <i class="material-icons small">remove_circle_outline</i>
                                </a>
                                <span class="col l4 m4 s4"> {{ $pedido_produto->qtd }} </span>
                                <a class="col l4 m4 s4" href="#" onclick="carrinhoAdicionarProduto({{ $pedido_produto->produto_id }})">
                                    <i class="material-icons small">add_circle_outline</i>
                                </a>
                            </div>
                            <a href="#" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 0)" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Retirar produto do carrinho?">Retirar produto</a>
                        </td>
                        <td> {{ $pedido_produto->produto->nome }} </td>
                        <td>R$ {{ number_format($pedido_produto->produto->valor, 2, ',', '.') }}</td>
                        <td>
                            <div class="input-field">
                            <form id="form-desconto" method="POST" action="{{route('carrinho.updateDesconto')}}">
                                {{ csrf_field() }}                                
                                <input type="hidden" name="pedido_id" value="">
                                <input type="hidden" name="produto_id" value="">
                                <input type="text" name="desconto" id="desconto" value="{{ $pedido_produto->descontos ? $pedido_produto->descontos : null }}" onchange="updateDesconto({{ $pedido->id }}, {{ $pedido_produto->produto_id }})">
                                <label for="desconto">Valor</label>
                            </form>
                            </div>
                        </td>
                        @php
                            $total_produto = $pedido_produto->valores - $pedido_produto->descontos;
                            $total_pedido += $total_produto;
                        @endphp
                        <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <strong class="col offset-l6 offset-m6 offset-s6 l4 m4 s4 right-align">Total do pedido: </strong>
                <span class="col l2 m2 s2">R$ {{ number_format($total_pedido, 2, ',', '.') }}</span>
            </div>

            <div class="row">
            <a class="btn-large tooltipped col l4 s4 m4 " data-position="top" data-delay="50" data-tooltip="Voltar a página inicial para continuar comprando?" href="{{ route('produtos', $pedido->cliente_id) }}">Continuar comprando</a>
            </div>
            
            <div class="row">
                
                <form method="POST" action="{{ route('carrinho.concluir') }}">
                    {{ csrf_field() }}
                    
                    <label for="status_pg">Status do Pagamento</label>
                    <select name="status_pg" id="status_pg" required>
                    <option value="" disabled selected>Selecione</option>
                    <option value="P" >Pago</option>
                    <option value="E" >Pagar na Entrega</option>
                    <option value="N" >Pendente</option>
                    </select>
                    <br>
                    <label for="meio_pg">Forma de Pagamento</label>
                    <select name="meio_pg" id="meio_pg" required>
                    <option value="" disabled selected>Selecione</option>
                    <option value="CD" >Cartão Débito</option>
                    <option value="CC" >Cartão Crédito</option>
                    <option value="D" >Dinheiro</option>
                    <option value="CA" >Cheque a Vista</option>
                    <option value="D30" >30 Dias Dinheiro</option>
                    <option value="C30" >30 Dias Cheque</option>
                    </select>
                    <br>
                    <label for="comprovante">Informe dados do Comprovante ou Cheque</label>
                    <input type="text" name="comprovante" id="comprovante" placeholder="Comprovante">
                    <br>
                    <label for="status_pg">Status da Entrega</label>
                    <select name="status_entrega" id="status_entrega">
                    <option value="" disabled selected>Selecione</option>
                    <option value="E" >Entregue</option>
                    <option value="P" >Pendente</option>
                    </select>
                    
                    <br>
                    <label for="data_entrega">Data da Entrega</label>
                    <br>
                    <input type="date" class="datepicker" name="data_entrega" id="data_entrega">

                    <br>
                    <label for="recebedor">Quem Recebeu?</label>
                    <input type="text" name="recebedor" id="recebedor">

                    <label for="obs">Observações do Pedido</label>
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea name="obs" id="obs" class="materialize-textarea"></textarea>

                    <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                    <input type="hidden" name="cliente_id" value="{{ $pedido->cliente_id }}">
                    <button type="submit" class="btn-large blue col l5 s5 m5 tooltipped" data-position="top" data-delay="50" data-tooltip="Adquirir os produtos concluindo a compra?">
                        Concluir compra
                    </button>   
                </form>
            </div>
        @empty
            <h5>Não há nenhum pedido no carrinho</h5>
        @endforelse
    </div>
</div>

<form id="form-remover-produto" method="POST" action="{{ route('carrinho.remover') }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <input type="hidden" name="pedido_id" value="">
    <input type="hidden" name="produto_id" value="">
    <input type="hidden" name="item" value="">
</form>
<form id="form-adicionar-produto" method="POST" action="{{ route('carrinho.adicionar') }}">
    {{ csrf_field() }}
    <input type="hidden" name="id">
    
    
    
</form>

<form id="form-updade-desconto" method="POST" action="{{ route('carrinho.adicionar') }}">
    {{ csrf_field() }}
    <input type="hidden" name="id">
    
</form>

@push('scripts')
    <script type="text/javascript" src="/js/carrinho.js"></script>        

@endpush

@endsection