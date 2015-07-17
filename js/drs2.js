var doNotShowSecondForm = true;
var data_receita = {};


function runUpdateAjax(id) {

    
    $.ajax({
        url: 'capturaDados.php',
        type: 'POST',
        dataType: 'html',
        data: {no: id, tabela: 'bancoDeReceitas', bd: 'drsoluti2_medicamentos'},
    })
    .done(function(result) {
        data_receita = JSON.parse(result);


        $('#nomeDaDoenca').val(data_receita.doenca);
        $('#nomeDaReceita').val(data_receita.nomeDaReceita);
        $('#textoReceita').val(data_receita.descricao);
        

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
            // habilita callback para mostrar de novo o formulario inicial de principio ativo
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

$('#enviarBtn').click(function(event) { // busca de principio ativo
    event.preventDefault();
    $('#mostraFormBtn').css({
            visibility: 'visible', // mostra botao de salvar remedio
            
        });
    $.ajax({
        url: 'pesquisaDados.php',
        type: 'post',
        dataType: 'html',
        data: {principio: $('#principio').val(),
                man: m }, // busca principio no banco de dados
    })
    .done(function(html) {
        $('#myModal').modal('show');
        if (html.indexOf("none")!=-1) { // nao teve achados, 
            $('#myModalLabel').html("<h3>Sem medicamentos</h3>");
            $('.modal-body').html("<p>Não foram achados medicamentos com o princípio ativo</p>");
            
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

$('#mostraFormBtn').click(function(event) { // esconde formulario de principio e mostra formulario para dar entrada com medicamento
    doNotShowSecondForm = false;
    $('#myModal').modal('hide');
  
});

$('.save-btn').on("click", function(event) {
    event.preventDefault();
    var myData = { nomeDaReceita: $('#nomeDaReceita').val(),
                       nomeDaDoenca: $('#nomeDaDoenca').val(),
                       textoReceita: $('#textoReceita').val(), // envia dados para gravacao no banco de dados
                       man: m};
    var myurl="";
    if ($(this).hasClass('update-btn')) {
        myData.no = data_receita.no;
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
        $('#myModalLabel').html("Inserção/Edição de Medicamentos");
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




