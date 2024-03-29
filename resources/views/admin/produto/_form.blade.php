<div class="input-field">
	<input type="number" name="codigoProduto" id="codigoProduto" value="{{ isset($registro->codigoProduto) ? $registro->codigoProduto : null }}">
	<label for="codigoProduto">Código do Produto</label>
</div>

<div class="input-field">
	<input type="text" name="categoria" id="categoria" value="{{ isset($registro->categoria) ? $registro->categoria : null }}">
	<label for="categoria">Categoria</label>
</div>

<div class="input-field">
	<input type="text" name="subCategoria" id="subCategoria" value="{{ isset($registro->subCategoria) ? $registro->subCategoria : null }}">
	<label for="subCategoria">Sub Categoria</label>
</div>

<div class="input-field">
	<input type="text" name="nome" id="nome" value="{{ isset($registro->nome) ? $registro->nome : null }}">
	<label for="nome">Nome</label>
</div>

<div class="input-field">
  <label for="descricao">Descrição</label>  <br><br>
  <textarea type="text" name="descricao" id="descricao" class="materialize-textarea">{{ isset($registro->descricao) ? $registro->descricao : null }}</textarea>	
</div>

<div class="input-field">
	<input type="text" name="valor" id="valor" value="{{ isset($registro->valor) ? $registro->valor : null }}">
	<label for="valor">Valor</label>
</div>

<div class="input-field">
	<input type="text" name="comissao" id="comissao" value="{{ isset($registro->comissao) ? $registro->comissao : null }}">
	<label for="comissao">Comissão</div>

<div class="input-field">
	<input type="text" name="imagem" id="imagem" value="{{ isset($registro->imagem) ? $registro->imagem : null }}">
	<label for="imagem">Imagem</label>
</div>

<div class="input-field">
    <div class="row">
        <label for="ativo">Promoção</label>
    </div>
    <div class="row">
      <input name="promocao" type="radio" id="promocao-s" value="S" {{ isset($registro->promocao) && $registro->promocao == 'S' ? ' checked="checked"' : null }} required="required" />
      <label for="promocao-s">Sim</label>
      <input name="promocao" type="radio" id="promocao-n" value="N" {{ isset($registro->promocao) && $registro->promocao == 'N' ? ' checked="checked"' : null }} required="required"  />
      <label for="promocao-n">Não</label>
    </div>
</div>

<div class="input-field">
    <div class="row">
        <label for="ativo">Ativo</label>
    </div>
    <div class="row">
      <input name="ativo" type="radio" id="ativo-s" value="S" {{ isset($registro->ativo) && $registro->ativo == 'S' ? ' checked="checked"' : null }} required="required" />
      <label for="ativo-s">Sim</label>
      <input name="ativo" type="radio" id="ativo-n" value="N" {{ isset($registro->ativo) && $registro->ativo == 'N' ? ' checked="checked"' : null }} required="required"  />
      <label for="ativo-n">Não</label>
    </div>
</div>