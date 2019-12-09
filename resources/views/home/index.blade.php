@extends('layout')
@section('pagina_titulo', 'HOME')

@section('pagina_conteudo')

<div class="container">
	<div class="row">
		<h5>Produtos</h5>
		<table id="example" class="display" style="width:100%">
			<thead>
				<tr>
				<th>Imagem</th>
				<th>Produto</th>
				<th>Valor</th>
				<th>Ação</th>
				</tr>
			</thead>
			<tbody>
				@foreach($registros as $r)
				<tr>
					<td>
					
					<img src="{{ $r->imagem }}" class="materialboxed" width="50">
					
					</td>

					<td>
					<span class="card-title grey-text text-darken-4 truncate" title="{{ $r->nome }}">{{ $r->codigoProduto }} - {{ $r->nome }}</span>
					<span class="card-title grey-text text-darken-4 truncate" title="{{ $r->nome }}">{{ $r->categoria }} - {{ $r->subCategoria }}</span>
					</td>

					<td>
					<p>R$ {{ number_format($r->valor, 2, ',', '.') }}</p>
					</td>

					<td>
					
						<form method="POST" action="{{ route('carrinho.adicionar') }}">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $r->id }}">

						<input type="hidden" name="cliente_id" value="{{ $cliente->id }}">

						<button class="col l12 m12 s12 green accent-4 tooltipped btn" data-position="bottom" data-delay="50" data-tooltip="O produto será adicionado ao seu carrinho">Comprar</button>   
						</form>
					
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