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
    <title>Novos Medicamentos</title>
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
    <!-- ends navbar --> <?php  echo "<h1 style='font-size:3em;color:white;background-color:black;'>SESSION = {$_SESSION['logged_in']}</h1>";   ?>
    <?php 

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

 
  