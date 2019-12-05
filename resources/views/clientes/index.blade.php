@extends('layout')
@section('pagina_titulo', 'Clientes' )

@section('pagina_conteudo')

<div class="container">
    <div class="row">
        <div class="row">
            <div class="col 10">
                <h3>Clientes Cadastrados</h3>
            </div>
            <div class="right col 2">
                <h3><a href="{{ route('clientes.create') }}" class="btn-floating btn-large waves-effect waves-light orange"><i class="material-icons">add</i></a></h3>
            </div>
        </div>
        <div class="row">
            
                <form action="{{ route('clientes.search') }}" method="get">
                    <div class="row">
                        <div class="input-field col 10">
                            <input type="text" name="search" id="search">
                            <label for="search">Search</label>
                        </div>
                        <div class="input-field col 2">
                            <button class="right btn waves-effect waves-light orange" type="submit" name="action">
                                <i class="material-icons">search</i>
                            </button>
                        </div>
                    </div>
                </form>
            
        </div>
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
        
        <table class="responsive-table highlight">
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

@push('scripts')
    <script type="text/javascript" src="/js/carrinho.js"></script>
@endpush

@endsection