function carrinhoRemoverProduto( idpedido, idproduto, item ) {
    $('#form-remover-produto input[name="pedido_id"]').val(idpedido);
    $('#form-remover-produto input[name="produto_id"]').val(idproduto);
    $('#form-remover-produto input[name="item"]').val(item);
    $('#form-remover-produto').submit();
}

function carrinhoAdicionarProduto( idproduto ) {
    $('#form-adicionar-produto input[name="id"]').val(idproduto);    
    $('#form-adicionar-produto').submit();
}

function updateDesconto( idpedido, idproduto, id) {
    $('#form-desconto input[name="id"]').val(id);
    $('#form-desconto input[name="pedido_id"]').val(idpedido);
    $('#form-desconto input[name="produto_id"]').val(idproduto);
    $('#form-desconto input[name="desconto"]').val();
    $('#form-desconto').submit();
}

function listaProdutos() {
    $('#form-categoria input[name="search"]').val(search);
    $('#form-categoria').submit();
}

// document.addEventListener('DOMContentLoaded', function() {
//     var elems = document.querySelectorAll('.datepicker');
//     var instances = M.Datepicker.init(elems, options);
// });

// // Or with jQuery

// $(document).ready(function(){
// $('.datepicker').datepicker();
// });