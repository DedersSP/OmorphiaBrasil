@extends('layout')
@section('pagina_titulo', 'Omorphiá - Cliente Editar')

@section('pagina_conteudo')
	<div class="container">
		<div class="row">
			<h3>Editar Cliente "{{ $registro->fantasia }}"</h3>
			<form method="POST" action="{{ route('clientes.update', $registro->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}

				@include('clientes._form')

				<button type="submit" class="right btn orange darken-2">Atualizar</button>
			</form>
		</div>
	</div>
	@include('clientes._lib')
@endsection