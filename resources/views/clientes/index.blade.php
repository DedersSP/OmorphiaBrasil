@extends('layout')
@section('pagina_titulo', 'Clientes' )

@section('pagina_conteudo')

<div class="container">
    <div class="row">
        <div class="row">
            <div class="col 10">
                <h5>Clientes Cadastrados</h5>
            </div>
            <div class="right col 2">
                <h3><a href="{{ route('clientes.create') }}" class="btn-floating btn-large waves-effect waves-light orange"><i class="material-icons">add</i></a></h3>
            </div>
        </div>
        
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
        
        <table id="example" class=" display responsive-table highlight" style="width:100%">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Salão</th>
                    <th>Local</th>
                    <th>Contatos</th>
                    
                    <th>ADM</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>
                        {{$cliente->id}}
                    </td>
                    <td>
                        <p>{{$cliente->fantasia}}</p>
                        <p>{{$cliente->razao}}</p>
                    </td>
                    <td>
                        <p>{{$cliente->endereco}}, {{$cliente->numero}}</p>
                        <p>{{$cliente->bairro}} - {{$cliente->cidade}}</p>
                    </td>
                    <td>
                        <p>{{$cliente->celular}}, {{$cliente->fixo}}</p>
                        <p>{{$cliente->email}}</p>
                    </td>
                    
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn-floating btn-large waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                        <a href="{{ route('produtos', $cliente->id) }}" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">shopping_cart</i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>
@endpush