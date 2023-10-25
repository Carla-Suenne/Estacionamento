// essa função está dizendo que é para carregar o js
//toda vez que carregar a pagina ele faz a leitura
$(document).ready(function(){

//é uma função para quando o usuario clickar em data-confirm (no botao)
//então ele vai executar (abrir) a janela modal
  $('a[data-confirm]').click(function(ev){
    var href = $(this).attr('href');
    //Se perceber que foi clickado no 
    if(!$('#confirm-delete').length){
      $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR ITEM<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Apagar</a></div></div></div></div>');
    }
    $('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
    return false;
    
  });
});