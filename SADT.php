<?php
include_once("connectMedic.php");
include_once("ChecaSessao.php");

if(isset($_SESSION['logged_in'])) { 

    $pageTitle="SADT";

    function customPageHeader() { ?>

    <?php }

    include_once("header.php");
    
?>        

   <!-- features -->
   <h2 class="section_header2">Exames SADT/TISS</h2>
        <div class="container">
           <div class="row">
                <div class="span2 offset5">
                   
                    <a href="novoExame.php" class="btn btn-success" target="_blank">Inserir/Editar Exame</a>
                </div>
            </div>
            <br/>
        	<div class="row form">
            
            	<div class="span6">
                    <form id="form1" class="form-horizontal" method="post" action="">
                        <div class="control-group"> 
                        
                            <label class="control-label" for="listaExames">Selecione: (Aceita seleção múltipla)</label>
                            <div class="controls">
                                <select multiple id="listaExames" class="span4" name="listaExames[]" size="5">
                        
                                <?php
                                

                                $soler = "Clinica Medica Soler. Av. Satélite 84, São Mateus, São Paulo, SP | tel (11) 2014-4599";
                                $intermedica = "intermedica";

                                if(isset($_COOKIE['local'])) {
                                    $local = mysql_real_escape_string($_COOKIE['local']);
                                } else {
                                    $local = $soler;
                                }

                                if(isset($_COOKIE['nome'])) {
                                    $nome = mysql_real_escape_string($_COOKIE['nome']);
                                } else {
                                    $nome = NULL;
                                }

                                if(isset($_COOKIE['convenio'])) {
                                    $convenio = mysql_real_escape_string($_COOKIE['convenio']);
                                } else {
                                    $convenio = $intermedica;
                                }

                                 //continua daqui
                                $con = connect();                  
                                $name = mysqli_query($con,"SELECT  `$nomeDB` FROM  `$tabelaExames` ORDER BY `$nomeDB`") or die(mysqli_error($con));
                                while ($name_row = mysqli_fetch_assoc($name)) {
                                    
                                    $selectItem = nl2br($name_row[$nomeDB]);
                                
                                    echo "<option value='".$selectItem."'>".$selectItem."</option>";
                                } 
                                
                                ?>
                        
                        
                             </select>
                            </div> <!-- fecha controls select exames-->
                        </div> <!-- fecha control-group select exames -->
                        <div class="control-group">
                            <label for="nomeDoPaciente" class="control-label">Nome do Paciente:</label>
                            <div class="controls">
                                
                                <?php if ($nome) {

                                ?> 
                                
                                <input type="text" class="span4" id="nomeDoPaciente" size="30" name="nomeDoPaciente" value="<?php echo $nome; ?>"/>

                                <?php } else { ?>

                                <input type="text" class="span4" id="nomeDoPaciente" size="30" name="nomeDoPaciente" placeholder="obrigatório"/>

                                <?php  } ?>
                            </div><!-- fecha controls text nomeDoPaciente-->
                         </div><!-- fecha control-group text nomeDoPaciente-->
                        <div class="control-group">
                            <label for="nomeConvenio" class="control-label">Convenio:</label>
                            <div class="controls">
                                <select id="nomeConvenio" class="span4" name="nomeConvenio" size="5">
                                    <?php
                                        $con = connect();
                                        $tabela ='logosConvenios';
                                        $name = mysqli_query($con, "SELECT  `nome` FROM  $tabela ORDER BY `nome`") or die(mysqli_error($con));
                                        while ($name_row = mysqli_fetch_assoc($name)) {
                                            
                                            $selectItem = nl2br($name_row['nome']);
                                
                                            if ($name_row['nome'] == $convenio) {
                                                echo "<option value='".$selectItem."' selected>".$selectItem."</option>";
                                            }
                                            else {
                                                echo "<option value='".$selectItem."'>".$selectItem."</option>";
                                            }
                                        } 
                                    
                                    ?>
                                    </select>
                            </div><!-- fecha controls select convenio-->
                        </div><!-- fecha control-group select convenio-->
                        <div class="control-group">
                            <label for="cid" class="control-label">CID:</label>
                            <div class="controls">
                                <input type="text" value="N20.0" class="span4" id="cid" size="5" name="cid" /><br/>
                            </div><!-- fecha controls input cid-->
                        </div><!-- fecha control-group input cid-->
                        <div class="control-group">
                            <label for="clinica" class="control-label">Clínica:</label>
                            <div class="controls">
                                <select id="nomeClinica" size="5" class="span4" name="nomeClinica" >
                                <?php
                        
                                    $tabela ='codigosTISS';
                                    $name = mysqli_query($con, "SELECT  `local` FROM  $tabela ORDER BY `local`") or die(mysqli_error($con));
                                    while ($name_row = mysqli_fetch_assoc($name)) {
                                        
                                        $selectItem = nl2br($name_row['local']);
										$selectItem2 = justTheName($selectItem);
                            
                                        if ($name_row['local'] == $local) {
                                            echo "<option value='".$selectItem."' selected>".$selectItem2."</option>";
                                        }
                                        else {
                                            echo "<option value='".$selectItem."'>".$selectItem2."</option>";
                                        }
                                    } 
                                
                                ?>
                            </div><!-- fecha controls select clinica-->
                        </div><!-- fecha control-group select clinica-->
                        
                        <div class="control-group">
                            <div class="controls">
                            	<input type="submit" id="enviarBtn" value="enviar" class="btn btn-success btn-large" />
                            </div>
                        </div>
                    </form>
				</div>     
  
                <div class="span6"> 
                    <form id="form2" class="form-horizontal" action="guiaTISS.php" method="post" >
                    
                        <?php
                     
                            if(	isset($_POST['nomeDoPaciente']) && !empty($_POST['nomeDoPaciente']) &&
                                isset($_POST['nomeConvenio']) && !empty($_POST['nomeConvenio']) &&
                                isset($_POST['listaExames']) && !empty($_POST['listaExames']) &&
                                isset($_POST['nomeClinica']) && !empty($_POST['nomeClinica'])) {
                                
                                $nomeClinica = $_POST['nomeClinica'];
                                $nome = $_POST['nomeDoPaciente'];
                                $nomeConvenio = $_POST['nomeConvenio'];

                                //if($_COOKIE['local'] != $nomeClinica) { setcookie('local', $nomeClinica, time() + 60*60*24*10, "/"); }
                                //if($_COOKIE['nome'] != $nome) { setcookie('nome', $nome, time() + 60*60*24*10, "/"); }
                                //if($_COOKIE['convenio'] != $nomeConvenio) { setcookie('convenio', $nomeConvenio, time() + 60*60*24*10, "/"); }
                                //ob_end_flush();

                                $cid = $_POST['cid'];
                         ?>
                         <input type="hidden" id="nomeDoPaciente2" size="30" name="nomeDoPaciente2"
                            value="<?php echo $nome ?>" />
                         
                            <input type="hidden" id="nomeConvenio2" name="nomeConvenio2" value="<?php echo ($nomeConvenio) ?>">
                            
                            <?php             
                            $tabela ='logosConvenios';                     
                            $imgQuery = mysqli_query($con,"SELECT descricao FROM  $tabela WHERE nome = '$nomeConvenio' ORDER BY `descricao`");
                            $imgConvenio = htmlentities($imgQuery->fetch_assoc()['descricao'], ENT_COMPAT,"UTF-8");
                            
                            $clinicaQuery = mysqli_query($con, "SELECT `codigo` FROM  $tabelaTISS WHERE `local` = '$nomeClinica'");
                            $codigoConvenio = htmlentities($clinicaQuery->fetch_assoc()['codigo'], ENT_COMPAT,"UTF-8");
                            ?>
                            <input type="hidden" id="imgConvenio" name="imgConvenio" value="<?php echo $imgConvenio ?>">
                            <input type="hidden" id="cid2" name="cid2" value="<?php echo $cid ?>">
                            <input type="hidden" id="nomeClinica2" name="nomeClinica2" value="<?php echo (justTheName($nomeClinica)) ?>">
                            <input type="hidden" id="codigoConvenio2" name="codigoConvenio2" value="<?php echo $codigoConvenio ?>">
                            
                        <div class="control-group">
                        <div class="controls"
                        	<p>Nome: <?php echo $nome;  ?></p>
                            <p>Convênio: <?php echo $nomeConvenio ?></p>
                            <p>CID: <?php echo $cid?></p>
                        </div>
                        </div>
                                                   
                        <div class="control-group">
                        
                            <div class="controls">
                                <?php
                                    $listaExames = $_POST['listaExames'];
                                    $tabela ='relExames';
                                    $consolidado =''; $i=0;
                                    $con = connect();
                                    
                                    foreach($listaExames as $exames) {
                                        $i++; 
                                        $examesQuery = mysqli_query($con, "SELECT `descricao` FROM  `$tabela` WHERE nome = '$exames' ORDER BY `descricao`");
                                        $consolidado .= htmlentities($examesQuery->fetch_assoc()['descricao'], ENT_COMPAT,"UTF-8");
                                        $consolidado .= ($i < count($listaExames))  ? "&#13;&#10;" : "";
                                        
                                    } 
                                                  
                                    echo"<textarea class='span4' rows='10' cols='80' name='exames' width='80'>$consolidado</textarea>";
									echo"<h4>Edite o campo acima se for necessário e em seguida clique no botão enviar abaixo</h4>";
                                    
                                    echo"<input type='submit' class='btn btn-info btn-large' value='enviar'>";
									
                            } else echo "<h1>Preencha todos os itens da tabela ao lado e clique enviar</h1>" ?>
                            </div>
                        </div>
                      
                    </form>
                </div>
            
            </div>
        </div>
    </div>

	<script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/drs.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
</body>
</html>
<?php } // fecha o if do session
else {
    header("Location:login.php");
}?>

