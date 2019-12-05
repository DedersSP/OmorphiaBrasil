<input type="hidden" name="user_id" id="user_id" value="{{isset($registro->user_id) ? $registro->user_id : $user}}">

<div class="input-field">
<select name="tipo" id="tipo" required>
    @if(isset($registro->tipo))
    <option value="J" {{isset($registro->tipo) && $registro->tipo == 'J' ? 'checked' : null }}>Jurídica</option>
    <option value="F" {{isset($registro->tipo) && $registro->tipo == 'F' ? 'checked' : null }} >Física</option>
    @else
    <option value="" disabled selected>Selecionar</option>
    <option value="J">Jurídica</option>
    <option value="F">Física</option>
    @endif
    
</select>
<label>Informe o tipo de cliente</label>
</div>


<div class="input-field">
	<input type="text" name="cnpj" id="cnpj" value="{{ isset($registro->cnpj) ? $registro->cnpj : null }}">
	<label for="cnpj">CNPJ</label>
</div>

<div class="input-field">
	<input type="text" name="cpf" id="cpf" value="{{ isset($registro->cpf) ? $registro->cpf : null }}">
	<label for="cpf">CPF</label>
</div>

<div class="input-field">
	<input type="text" name="insEstadual" id="insEstadual" value="{{ isset($registro->insEstadual) ? $registro->insEstadual : null }}">
	<label for="insEstadual">Inscrição Estadual</label>
</div>

<div class="input-field">
	<input type="text" name="fantasia" id="fantasia" value="{{ isset($registro->fantasia) ? $registro->fantasia : null }}">
	<label for="fantasia">Nome Fantasia ou Consumidor</label>
</div>

<div class="input-field">
	<input type="text" name="razao" id="razao" value="{{ isset($registro->razao) ? $registro->razao : null }}">
	<label for="razao">Razão Social</label>
</div>

<div class="input-field">
	<input type="text" name="cep" id="cep" required value="{{ isset($registro->cep) ? $registro->cep : null }}">
	<label for="cep">CEP</label>
</div>

<div class="row">
    <div class="input-field col s10">
        <input type="text" name="endereco" id="endereco" required value="{{ isset($registro->endereco) ? $registro->endereco : null }}">
        <label for="endereco">Endereço</label>
    </div>
    <div class="input-field col s2">
        <input type="text" name="numero" id="numero" required value="{{ isset($registro->numero) ? $registro->numero : null }}">
        <label for="numero">Nº</label>
    </div>
</div>

<div class="row">
    <div class="input-field col s3">
        <input type="text" name="bairro" id="bairro" required value="{{ isset($registro->bairro) ? $registro->bairro : null }}">
        <label for="bairro">Bairro</label>
    </div>
    <div class="input-field col s3">
        <input type="text" name="complemento" id="complemento" value="{{ isset($registro->complemento) ? $registro->complemento : null }}">
        <label for="complemento">Complemento</label>
    </div>
    <div class="input-field col s4">
        <input type="text" name="cidade" id="cidade" required value="{{ isset($registro->cidade) ? $registro->cidade : null }}">
        <label for="cidade">Cidade</label>
    </div>
    <div class="input-field col s2">
        <select name="estado" id="estado" required>
            @if(isset($registro->estado))
            <option value="SP" {{$registro->estado == 'SP' ? 'checked="checked"' : null}}>SP</option>
            @else
            <option value="" disabled selected>Selecionar</option>
            <option value="SP">SP</option>
            @endif
        </select>
        
        <label for="estado">UF</label>
    </div>
</div>

<div class="row">
    <div class="input-field col s8">
        <input type="text" name="responsavel" id="responsavel" required value="{{ isset($registro->responsavel) ? $registro->responsavel : null }}">
        <label for="responsavel">Nome do Responsável</label>
    </div>
    <div class="input-field col s4">
        <select name="cargo" id="cargo" required>
            @if(isset($registro->estado))
            <option value="1" {{ isset($registro->cargo) && $registro->cargo == '1' ? ' checked="checked"' : null }}>Proprietário</option>
            <option value="2" {{ isset($registro->cargo) && $registro->cargo == '2' ? ' checked="checked"' : null }}>Proprietário e Cabeleleiro</option>
            <option value="3" {{ isset($registro->cargo) && $registro->cargo == '3' ? ' checked="checked"' : null }}>Cabeleleiro</option>
            <option value="4" {{ isset($registro->cargo) && $registro->cargo == '4' ? ' checked="checked"' : null }}>Consumidor(a)</option>
            <option value="5" {{ isset($registro->cargo) && $registro->cargo == '5' ? ' checked="checked"' : null }}>Loja</option>

            @else
            <option value="" disabled selected>Selecionar</option>
            <option value="1">Proprietário</option>
            <option value="2">Proprietário e Cabeleleiro</option>
            <option value="3">Cabeleleiro</option>
            <option value="4">Consumidor(a)</option>
            <option value="5">Loja</option>
            @endif
        </select>
        
        <label for="cargo">Cargo</label>
    </div>
</div>

<div class="row">
    <div class="input-field col s6">
        <input type="text" name="celular" id="celular" required value="{{ isset($registro->celular) ? $registro->celular : null }}">
        <label for="celular">Celular com DDD</label>
    </div>
    <div class="input-field col s6">
        <input type="text" name="fixo" id="fixo" value="{{ isset($registro->fixo) ? $registro->fixo : null }}">
        <label for="fixo">Fixo com DDD</label>
    </div>
</div>

<div class="input-field">
        <input type="text" name="email" id="email" value="{{ isset($registro->email) ? $registro->email : null }}">
        <label for="email">Email para Contato</label>
</div>

<div class="row">
    <div class="input-field col s6">
            <input type="text" name="facebook" id="facebook" value="{{ isset($registro->facebook) ? $registro->facebook : null }}">
            <label for="facebook">Perfil Facebook</label>
    </div>
    <div class="input-field col s6">
            <input type="text" name="instagram" id="instagram" value="{{ isset($registro->instagram) ? $registro->instagram : null }}">
            <label for="instagram">Perfil Instagram</label>
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        <label for="Observacoes">Observações Considerações</label>    <br><br>
        <textarea id="Observacoes" name="Observacoes" class="materialize-textarea">{{ isset($registro->Observacoes) ? $registro->Observacoes : null }}</textarea>    
    </div>
</div>
<br>
<div class="row">
<div class="input-field">
<select name="cabeleleiros" id="cabeleleiros">
    @if(isset($registro->cabeleleiros))
    <option value="1-3" {{ isset($registro->cabeleleiros) && $registro->cabeleleiros == '1-3' ? ' checked="checked"' : null }}>De 1 a 3</option>
    <option value="3-5" {{ isset($registro->cabeleleiros) && $registro->cabeleleiros == '3-5' ? ' checked="checked"' : null }}>De 3 a 5</option>
    <option value="5-7" {{ isset($registro->cabeleleiros) && $registro->cabeleleiros == '5-7' ? ' checked="checked"' : null }}>De 5 a 7</option>
    <option value="+7" {{ isset($registro->cabeleleiros) && $registro->cabeleleiros == '+7' ? ' checked="checked"' : null }}>+ de 7</option>
    @else
    <option value="" disabled selected>Selecione</option>
    <option value="1-3">De 1 a 3</option>
    <option value="3-5">De 3 a 5</option>
    <option value="5-7">De 5 a 7</option>
    <option value="+7">+ de 7</option>
    @endif
    
</select>
<label>Informe a quantidade de cabeleleiros</label>
</div>
</div>

<div class="input-field">
    <div class="row">
        <label for="novidades">Aceita Receber Novidades e Promoções</label>
    </div>
    <div class="row">
      <input name="novidades" type="radio" id="novidades-s" value="S" {{ isset($registro->novidades) && $registro->novidades == 'S' ? ' checked="checked"' : null }} required="required" />
      <label for="novidades-s">Sim</label>
      <input name="novidades" type="radio" id="novidades-n" value="N" {{ isset($registro->novidades) && $registro->novidades == 'N' ? ' checked="checked"' : null }} required="required"  />
      <label for="novidades-n">Não</label>
    </div>
</div>

<div class="input-field">
    <div class="row">
        <label for="whatsapp">Aceita Receber Novidades por Whatsapp</label>
    </div>
    <div class="row">
      <input name="whatsapp" type="radio" id="whatsapp-s" value="S" {{ isset($registro->whatsapp) && $registro->whatsapp == 'S' ? ' checked="checked"' : null }} required="required" />
      <label for="whatsapp-s">Sim</label>
      <input name="whatsapp" type="radio" id="whatsapp-n" value="N" {{ isset($registro->whatsapp) && $registro->whatsapp == 'N' ? ' checked="checked"' : null }} required="required"  />
      <label for="whatsapp-n">Não</label>
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