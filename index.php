<?php
include_once("connectMedic.php");
ob_start();
session_start();
echo "<h1 style='font-size:3em;color:white;background-color:black;'>SESSION = {$_SESSION['logged_in']}</h1>";       

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
        
        setcookie('email', $_POST['email'], time() + 600);
        setcookie('pass', $_POST['pass'], time() + 600);
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
    <title>Menu</title>
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
    <!-- ends navbar -->
  
<!-- empresa -->
    <div id="myLinks">
        <div class="container">
            <!-- header -->
            <h2 class="section_header">
                
            </h2>

            <!-- princípios -->
            <div class="row">
                <div class="span12">
                
                <a href="medicamentos.php" class="linksDRS" target="_blank">Medicamentos</a>
                
                </div>
            </div>
            <div class="row">
                <div class="span12">
                
                <a href="medicamentos.php?man=1" class="linksDRS" target="_blank">Medicamentos Manipulados</a>
                
                </div>
            </div>
            <div class="row">
                <div class="span12">
               
                <a href="SADT.php" class="linksDRS" target="_blank">Guias de exames SADT</a>
                
                </div>
            </div>
            <div class="row">
                <div class="span12">
                
                <a href="atestado.php" class="linksDRS" target="_blank">Atestados</a>
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
