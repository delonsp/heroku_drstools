<?php
include_once("connectMedic.php");
include("ChecaSessao.php");

if(isset($_SESSION['login'])) { 

    $pageTitle="Nova Receita";

    function customPageHeader() { ?>

    <?php }

    include_once("header.php");
    

    if (isset($_GET['man']) && $_GET['man']==1) {
        $m = 1;
        echo '<h2 class="section_header2">Introduzir/Editar Medicamentos Manipulados</h2>';

    } else {
        $m = 0;
        echo '<h2 class="section_header2">Introduzir/Editar Medicamentos Comuns</h2>';
    }

    echo "<script>var m=$m</script>";

    ?>
    <div id="contact" class="contact_page">
        <div class="container">
        	
            <div class="row form">
                <div class="span6" id="firstFormRow">
                    <h3>Pesquisa de princípio ativo</h3>
                    <form class="form-horizontal" method="post" action="" id="form1">
                         <div class="control-group">
                            <label class="control-label" for="principio">Princípio ativo:</label>
                            <div class="controls">
                                                                
                            	<input type="text" class="span4" id="principio" size="30" name="principio" placeholder="obrigatório"/>
                               
                            </div>
                        </div>
                        
                        
                        <div class="control-group">
                            
                            <div class="controls">
                                <input type="submit" id="envioBtn" value="Enviar" class="btn btn-success" />
                            </div>
                        </div>
                        
                         
                    </form>
                    <h3>Salvar direto sem pesquisa</h3>
                    <input type="submit" id="salvarDireto" name="salvarDireto" value="Novo Medicamento" class="btn btn-primary" />
                </div>
                <div class="span6 hidden" id="secondFormRow">
                    <form class="form-horizontal" method="post" action="" id="form2">
                         <div class="control-group">
                            <label class="control-label" for="nomeDaDoenca">Nome da Doença:</label>
                            <div class="controls">
                                                                
                                <input type="text" class="span4" id="nomeDaDoenca" size="30" name="nomeDaDoenca" placeholder="obrigatório"/>
                               
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="nomeDaReceita">Nome da Receita:</label>
                            <div class="controls">
                                                                
                                <input type="text" class="span4" id="nomeDaReceita" size="30" name="nomeDaReceita" placeholder="obrigatório"/>
                               
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="textoReceita">Texto da Receita:</label>
                            <div class="controls">
                                <textarea rows='20' cols='50' class="span4" id="textoReceita" size="100" name="textoReceita"></textarea>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            
                            <div class="controls">
                                <input type="submit" id="gravarBtn" value="Gravar" class="btn btn-success save-btn" />
                            
                                <input type="submit" id="cancelForm" value="Cancelar" class="btn btn-alert" />
                            </div>
                        </div>
                         
                    </form>
                </div>

            </div>
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Medicamentos achados</h3>
              </div>
              <div class="modal-body">
                
              </div>
              <div class="modal-footer">
                <button class="btn" id="cancelBtn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button class="btn btn-primar" id="mostraFormBtn">Salvar Novo</button>
              </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/drs.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/drs2.js"></script>

</body>
</html>
<?php } // fecha o if do session
else {
    header("Location:login.php");
}?>

 
  