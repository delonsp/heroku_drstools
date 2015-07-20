<?php
include_once("connectMedic.php");

session_start();
      
if(isset($_POST['login'], $_POST['pass']) || isset($_COOKIE['login'], $_COOKIE['pass'])) {
    $con = connect();
    if(isset($_COOKIE['login'], $_COOKIE['pass'])) {
        $email = mysqli_real_escape_string($con, $_COOKIE['login']);
        $pass = mysqli_real_escape_string($con, $_COOKIE['pass']);
        
    } else {
        $email = mysqli_real_escape_string($con, $_POST['login']);
        $pass = mysqli_real_escape_string($con, $_POST['pass']);
    }

    $query1 = "SELECT COUNT(`$userId`) FROM $tabelaUser WHERE `$userEmail` = '$email' AND `$userPass` = '$pass'";
    
    $users = mysqli_query($con, $query1);
    $total = my_mysqli_result($users,0); // from connectMedic.php
    
    if ($total ==1) {
        
        setcookie('login', $_POST['login'], time() + 1728000);
        setcookie('pass', $_POST['pass'], time() + 1728000);
        $_SESSION['logged_in'] = 1; 
    }
    
    if(isset($_SESSION['last_ip']) === false) {
        $_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
        
    }
    
    if($_SESSION['last_ip'] !== $_SERVER['REMOTE_ADDR']) {
        
        session_unset();
        session_destroy();  
    }
}

if(isset($_SESSION['logged_in'])) { 
    
?>        


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.ico?v=2">
    <title>Medicamentos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/drs.css">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <link rel="stylesheet" type="text/css" href="css/external-pages.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
</head>
<body>
<a href="#" class="scrolltop">
        <span>up</span>
    </a>
    <!-- begins navbar -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand scroller" href="index.php">
                <img src="img/logo.png" alt="logo" />
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li><a href="index.php">Menu</a></li>
                    <li><a href="medicamentos.php">Medicamentos</a></li>
                    <li><a href="medicamentos.php?man=1">Medicamentos Manipulados</a></li>
                    <li><a href="SADT.php">Exames SADT/TISS</a></li>
                    <li><a href="atestado.php">Atestados</a></li>
                    
                    
                </ul>
            </div>
        </div>
      </div>
    </div>
    <!-- ends navbar --> <?php  echo "<h1 style='font-size:3em;color:white;background-color:black;'>COOKIE = {$_COOKIE['login']}</h1>";   ?>
    <?php 

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

 
  