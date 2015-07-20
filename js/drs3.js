var doNotShowSecondForm = true;
var data_exame = {};


function runUpdateAjax(id) {

    
    $.ajax({
        url: 'capturaDados.php',
        type: 'POST',
        dataType: 'html',
        data: {no: id, tabela: 'relExames', bd: 'drsoluti2_exames' }
    })
    .done(function(result) {
        data_exame = JSON.parse(result);


        $('#nomeDoExame').val(data_exame.nome);
        $('#descricao').val(data_exame.descricao);
               

        $('#gravarBtn').removeClass('btn-success').addClass('btn-warning').val("Gravar Mudanças");
        $('#gravarBtn').addClass('update-btn').removeClass('save-btn');
        


    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
        
}






$(function() {
   
    $('#myModal').on('hidden', function () { 
            // habilita callback para mostrar de novo o formulario inicial de nomeDoExame ativo
            // e esconder o formulario de nova medicacao.


            if (doNotShowSecondForm) {
                
                $('#firstFormRow').show();
                $('#secondFormRow').addClass('hidden');
                $('#gravarBtn').addClass('btn-success').removeClass('btn-warning').val("Gravar");
                $('#gravarBtn').removeClass('update-btn').addClass('save-btn');
            
            } else {
                $('#firstFormRow').hide();
                $('#secondFormRow').removeClass('hidden');
            }

            
        });

});

$('#envioBtn').click(function(event) { // busca de nomeDoExame ativo
    event.preventDefault();
    $('#mostraFormBtn').css({
            visibility: 'visible', // mostra botao de salvar remedio
            
        });
    $.ajax({
        url: 'pesquisaDados.php',
        type: 'post',
        dataType: 'html',
        data: {exame: $('#exame').val()
                 }, // busca nomeDoExame no banco de dados
    })
    .done(function(html) {
        $('#myModal').modal('show');
        if (html.indexOf("none")!=-1) { // nao teve achados, 
            $('#myModalLabel').html("<h3>Sem exames</h3>");
            $('.modal-body').html("<p>Não foram achados exames com o nome inserido.</p>");
            
        } else if (html.indexOf("Dados inválidos.")!=-1) { // campo em branco
            
            $('#myModalLabel').html(html);
            $('.modal-body').html("<div class='alert alert-danger'>Favor tentar novamente</div>");
            $('#mostraFormBtn').css({
                visibility: 'hidden',
                
            });               
        } else {
            
            $('.modal-body').html(html);
            
            $('.btn-warning').click(function(event) { // editar medicacao
                doNotShowSecondForm = false;
                $('#myModal').modal('hide');
               
                // put code to edit recipes

                runUpdateAjax(this.id);

            });
        }
        
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
});

$('#mostraFormBtn').click(function(event) { // esconde formulario de nomeDoExame e mostra formulario para dar entrada com medicamento
    doNotShowSecondForm = false;
    $('#myModal').modal('hide');
  
});

$('#salvarDireto').click(function(event) {
    event.preventDefault();
    $('#firstFormRow').hide();
    $('#secondFormRow').removeClass('hidden');

});

$('.save-btn').on("click", function(event) {
    event.preventDefault();
    var myData = { nomeDoExame: $('#nomeDoExame').val(),
                       descricao: $('#descricao').val(),
                        // envia dados para gravacao no banco de dados
                       };
    var myurl="";
    if ($(this).hasClass('update-btn')) {
        myData.no = data_exame.no;
        myurl = "atualizaDados.php"; 

    } else {
        myurl = "insereDados.php"; 
    }
    
    $.ajax({
        url: myurl,
        type: 'post',
        dataType: 'html',
        data: myData
    })
    .done(function(html) {
        $('#myModal').modal('show'); // mostra modal que insercao no banco de dados foi com sucesso ou não
        $('#myModalLabel').html("Inserção/Edição de Exames");
        $('.modal-body').html(html);
        $('#cancelBtn').html('Fechar');
        $('#mostraFormBtn').css({
            visibility: 'hidden',
            
        });
        if (html.indexOf("Dados inválidos. Favor tentar novamente")!=-1) {
            doNotShowSecondForm = false;
        } else {
            doNotShowSecondForm = true;
        }
        
        
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
});




