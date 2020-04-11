
    // DATA TABLES
    $(document).ready(function() {
        $('#tableDenuncias').DataTable();
    } );

    // PARA APAGAR PERGUNTA
    // PEGA O ID DA PERGUNTA QUE CLICOU
    $('.apagarPergunta').click(function(event){
        var id_clicou=$(this).attr('idPerguntaApagar');
        var idDenuncia=$(this).attr('idDenunciaApagar');
        $('#idPerguntaApagarConfirmar').html(id_clicou);
        $('#idDenunciaApagarConfirmar').html(idDenuncia);
    });
    $('.apagarPergunta').click(function(event){
        var descricao=$(this).attr('descricaoPerguntaApagar')
        $('#descricaoPerguntaApagarConfirmar').html(descricao);
    });