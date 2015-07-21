<?php
include_once("connectMedic.php");
include_once("ChecaSessao.php");

if(isset($_SESSION['logged_in'])) { 

    $pageTitle="Novo Exame";

    function customPageHeader() { ?>

    <?php }

    include_once("header.php");
    
?>        
    <h2 class="section_header2">Introduzir/Editar Exames</h2>
    <div id="contact" class="contact_page">
        <div class="container">
        	
            <div class="row form">
                <div class="span6" id="firstFormRow">
                    <h3>Pesquisa de exame</h3>
                    <form class="form-horizontal" method="post" action="" id="form1">
                         <div class="control-group">
                            <label class="control-label" for="exame">Exame:</label>
                            <div class="controls">
                                                                
                            	<input type="text" class="span4" id="exame" size="30" name="exame" placeholder="obrigatório"/>
                               
                            </div>
                        </div>
                        
                        
                        <div class="control-group">
                            
                            <div class="controls">
                                <input type="submit" id="envioBtn" value="enviar" class="btn btn-success" />
                                
                            </div>
                        </div>
                        
                        
                    </form>
                    <h3>Salvar direto sem pesquisa</h3>
                    <input type="submit" id="salvarDireto" name="salvarDireto" value="Novo Exame" class="btn btn-primary" />
                          
                </div>
                <div class="span6 hidden" id="secondFormRow">
                    <form class="form-horizontal" method="post" action="" id="form2">
                         <div class="control-group">
                            <label class="control-label" for="nomeDoExame">Nome(s) do(s) Exame(s):</label>
                            <div class="controls">
                                                                
                                <input type="text" class="span4" id="nomeDoExame" size="30" name="nomeDoExame" placeholder="obrigatório"/>
                               
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="descricao">Descricao:</label>
                            <div class="controls">
                                <textarea rows='10' cols='50' class="span4" id="descricao" size="100" name="descricao"></textarea>
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
                <h3 id="myModalLabel">Exames achados</h3>
              </div>
              <div class="modal-body">
                
              </div>
              <div class="modal-footer">
                <button class="btn" id="cancelBtn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button class="btn btn-primary" id="mostraFormBtn">Salvar Novo</button>
              </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/drs.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/drs3.js"></script>

</body>
</html>
<?php } // fecha o if do session
else {
    header("Location:login.php");
}?>

 
  