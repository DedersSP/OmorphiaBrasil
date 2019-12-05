@extends('layout')
@section('pagina_titulo', 'HOME')

@section('pagina_conteudo')

<div class="container">
	<div class="row">
	<br>
		<div class="row">
			<form action="{{ route('produtos', $cliente->id) }}" name="form-categoria" id="form-categoria">
				<div class="input-field col s4">
				<select name="search" id="search" onchange="listaProdutos(this)">
				<option value="" disabled selected>Selecione</option>
				
				@foreach($categorias as $c)
				<option value="{{$c->categoria}}">{{$c->categoria}}</option>
				@endforeach
				
				</select>
				<label>Categoria</label>
				</div>
			</form>
		</div>
	@foreach($registros as $r)
		<div class="col s12 m6 l4">
			<div class="card large">
				<div class="card-image">
					<img src="{{ $r->imagem }}" class="responsive-img">
				</div>
				<div class="card-content">
					<span class="card-title grey-text text-darken-4 truncate" title="{{ $r->nome }}">{{ $r->nome }}</span>
					<p>R$ {{ number_format($r->valor, 2, ',', '.') }}</p>
				</div>
				<br>
				<div class="card-action">
					<form method="POST" action="{{ route('carrinho.adicionar') }}">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $r->id }}">
						
						<input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
						
						<button class="col l6 m6 s6 green accent-4 tooltipped btn" data-position="bottom" data-delay="50" data-tooltip="O produto será adicionado ao seu carrinho">Comprar</button>   
            		</form>
				</div>
			</div>
		</div>
	@endforeach
	</div>
</div>

@endsection
@push('scripts')
	<script type="text/javascript" src="/js/carrinho.js"></script>        
@endpush