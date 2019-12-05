@extends('layout')
@section('pagina_titulo', 'Omorphiá - Cliente Adicionar')

@section('pagina_conteudo')
	<div class="container">
		<div class="row">
			<h3>Adicionar Cliente</h3>
			<form method="POST" action="{{ route('clientes.store') }}">
				{{ csrf_field() }}
				@include('clientes._form')

				<button type="submit" class="right btn orange darken-2">Salvar</button>
			</form>
		</div>
	</div>
	@include('clientes._lib')
@endsection