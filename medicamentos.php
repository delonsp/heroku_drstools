<?php
include_once("connectMedic.php");
include("ChecaSessao.php");

if(isset($_SESSION['login'])) { 


    $pageTitle="medicamentos";

    function customPageHeader() { ?>

    <?php }
    
    include_once("header.php");
      

    if (isset($_GET['man'])) {
        $m = 1;
        echo '<h2 class="section_header2">Medicamentos Manipulados</h2>';
    } else {
        $m = 0;
        echo '<h2 class="section_header2">Medicamentos Comuns</h2>';
    }

    ?>
    
    <div id="contact" class="contact_page">
        <div class="container">
            <div class="row">
                <div class="span2 offset5">
                   
                    <a href="NovaReceita.php?man=<?php echo $m; ?>" class="btn btn-success" target="_blank">Inserir/Editar Receita</a>
                </div>
            </div>
            <div class="row form">
                <div class="span6">
                    <form class="form-horizontal" method="post" action="" id="form1">
                        <div class="control-group">
                            <label class="control-label" for="listaMedic">Selecione:</label>
                            <div class="controls">
                                <select multiple id="listaMedic" name="listaMedic[]" size="10" class="span4">
                                <?php

                                $soler = "Clinica Medica Soler. Av. Satélite 84, São Mateus, São Paulo, SP | tel (11) 2014-4599";

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

                                $con=connect();
                                
                                                                                   
                                $name = mysqli_query($con,"SELECT  `$nomeDaReceitaDB` FROM  $tabelaReceitas WHERE `$man`=$m ORDER BY `$nomeDaReceitaDB`") or die(mysqli_error($con));
                                while ($name_row = mysqli_fetch_assoc($name)) {
                                    
                                    $selectItem = nl2br($name_row[$nomeDaReceitaDB]);
                                
                                    echo "<option value='".$selectItem."'>".$selectItem."</option>";
                                } 
                                
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="nomeDoPaciente">Nome do paciente:</label>
                            <div class="controls">
                                <?php if ($nome) {

                                ?> 
                                
                                <input type="text" class="span4" id="nomeDoPaciente" size="30" name="nomeDoPaciente" value="<?php echo $nome; ?>"/>

                                <?php } else { ?>

                                <input type="text" class="span4" id="nomeDoPaciente" size="30" name="nomeDoPaciente" placeholder="obrigatório"/>

                                <?php  } ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="endDoPaciente">Endereço:</label>
                            <div class="controls">
                                <input type="text" class="span4" id="endDoPaciente" size="100" name="endDoPaciente" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="telsDoPaciente">Telefones:</label>
                            <div class="controls">
                                <input type="text" class="span4" id="telsDoPaciente" name="telsDoPaciente" size="30" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="emailDoPaciente">Email:</label>
                            <div class="controls">
                                <input type="text" class="span4" id="emailDoPaciente" name="emailDoPaciente" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="clinica" class="control-label">Clínica:</label>
                            <div class="controls">
                                <select id="nomeClinica" class="span4" name="nomeClinica" size="5">
                                <?php
                                    $con=connect();
                                   
                                    $name = mysqli_query($con,"SELECT  `$localDB` FROM `$tabelaTISS` ORDER BY `$localDB`") or die(mysqli_error($con));
                                    while ($name_row = mysqli_fetch_assoc($name)) {
                                        
                                        $selectItem = nl2br($name_row[$localDB]);
                                        $selectItem2= justTheName($selectItem);
                            
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
                    <form class="form-horizontal" method="post" action="imprimirReceita.php" id="form2">
                        <div class="control-group">
                            
                            <div class="controls">
                                <?php

     
                                if( isset($_POST['nomeDoPaciente']) && isset($_POST['telsDoPaciente']) &&
                                    !empty($_POST['nomeDoPaciente']) && !empty($_POST['telsDoPaciente']) &&
                                    isset($_POST['listaMedic']) && !empty($_POST['listaMedic'])) {
                                    
                                
                                    setlocale(LC_ALL, "pt_BR.utf-8", "pt_BR", "portuguese");
                                    $nome = strtoupper($_POST['nomeDoPaciente']);
                                    
                                    //if($_COOKIE['nome'] != $nome) { setcookie('nome', $nome, time() + 600); }

                                    $tels = $_POST['telsDoPaciente'];
                                    $nomeClinica = $_POST['nomeClinica'];
                                    
                                    //if($_COOKIE['local'] != $nomeClinica) { setcookie('local', $nomeClinica, time() + 600); }
                                    //ob_end_flush();
                                                
                                    $consolidado = "";
                                    
                                    $listaMedic = $_POST['listaMedic'];
                                    $con=connect();
                                    
                                    foreach($listaMedic as $remedio) {
                                                                                
                                        $receita = mysqli_query($con,"SELECT `$descricaoDB` FROM  $tabelaReceitas WHERE `$nomeDaReceitaDB` = '$remedio'");
                                    
                                        $consolidado .= htmlentities($receita->fetch_assoc()[$descricaoDB], ENT_COMPAT,"UTF-8");
                                        $consolidado .= "&#10;&#13;&#10;";
                                        
                                    }
                                $consolidado = trim($consolidado);
                                              
                                echo"<textarea rows='20' class='span4' cols='50' name='receitas'>$consolidado</textarea>";
                                 
                                echo'<br/>';

                                $con=connect();

                                $logo = mysqli_query($con,"SELECT `$logoDB` FROM $tabelaTISS WHERE `$localDB` = '$nomeClinica'");
                                $logo = $logo->fetch_assoc()[$logoDB];
                                                        
                            ?>
                                
                            </div>
                        </div>
                        <div class="row">

                            <?php if ($m==1) { ?>
                                                            
                            
                            <div class="span3 my-div">
                               
                                    <div class="controls" >
                                        <label class="control-label" for="email_medformula">Medformula</label>
                                        
                                        <input type="checkbox" checked="yes" id="email_medformula"  name="email_medformula"  />
                                        
                                    </div>
                               
                            </div>
                            
                            
                            
                            <div class="span3 my-div">
                                
                                    <div class="controls">
                                        <label class="control-label" for="email_newFarma">New Farma</label>
                                        
                                        <input type="checkbox" id="email_newFarma" checked="yes" name="email_newFarma"  />
                                       
                                    </div>
                               
                            </div>
                            <input type="hidden" name="man" id="man" value="<?php echo $man; ?>" />

                            <?php } // closes the if clause that verifies that if it is manipulated ?>

                            
                            <div class="span3 my-div">
                                
                                    <div class="controls">
                                        <label class="control-label" for="colocar_data">Colocar data</label>
                                        <input type="checkbox" checked="yes" id="colocar_data" name="colocar_data"  />
                                       
                                    </div>
                               
                            </div>
                        </div>
                        
                        <input type="hidden" name="nomeDoPaciente2" id="nomeDoPaciente2" value="<?php echo $nome; ?>" />
                        <input type="hidden" name="nomeClinica2" id="nomeClinica2" value="<?php echo $nomeClinica; ?>" />
                        <input type="hidden" name="telsDoPaciente2" id="telsDoPaciente2" value="<?php echo $tels; ?>" />
                        <input type="hidden" name="endDoPaciente2" id="endDoPaciente2" value="<?php echo $_POST['endDoPaciente']; ?>" />
                        <input type="hidden" name="logo2" id="logo2" value="<?php echo $logo; ?>" />

                        <div class="control-group">
                            
                            <div class="controls">
                                
                                <input type='submit' class='btn btn-info btn-large' value='enviar'>
                            </div>
                        </div>
                        <?php
                        } // closes the if isset(POST[]....
                            
                        ?>
                        
                        
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

 
  