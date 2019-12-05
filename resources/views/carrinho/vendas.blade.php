@extends('layout')
@section('pagina_titulo', 'Vendas Realizadas' )

@section('pagina_conteudo')

<div class="container">
    <div class="row">
        <h5>Vendas Efetuadas</h5>

        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nº do Pedido</th>
                    <th>Cliente</th>
                    <th>Status</th>
                    <th>Status do Pg</th>
                    <th>Forma de Pg</th>
                    <th>Status da Entrega</th>                    
                    <th>Valor</th>
                    <th>Adm</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendas as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->cliente_id}} - {{$v->pedidoCliente->fantasia}}</td>
                    <td>
                        {{$v->status == "PA" ? "Pago" : "Cancelado"}}
                    </td>
                    <td>
                        {{$v->status_pg}}
                    </td>
                    <td>{{$v->meio_pg}}</td>
                    <td>
                        {{$v->status_entrega == "P" ? "Pendente" : "Entregue"}}
                    </td>
                                        
                    <td>{{$v->pedido_total($v->id)}}</td>
                    
                    <td>
                        <a class="btn-floating btn-large waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        

    </div>

</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
@endpush