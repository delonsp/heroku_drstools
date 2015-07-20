<?php
include_once("connectMedic.php");
session_start();
connectToMedicamentos();         
$tabela = 'user_system';
if(isset($_POST['login'], $_POST['pass']) || isset($_COOKIE['login'], $_COOKIE['pass'])) {
	if(isset($_COOKIE['login'], $_COOKIE['pass'])) {
		$email = mysql_real_escape_string($_COOKIE['login']);
		$pass = mysql_real_escape_string($_COOKIE['pass']);
		
	} else {
		$email = mysql_real_escape_string($_POST['login']);
		$pass = mysql_real_escape_string($_POST['pass']);
	}
	
	$query1 = "SELECT COUNT(`user_id`) FROM $tabela WHERE `user_email` = '$email' AND `user_password` = '$pass'";
	
	$users = mysql_query($query1);
	$total = mysql_result($users,0);
	
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

if(isset($_SESSION['logged_in']) && !empty($email) && isset($email))  
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.ico">
	<title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <link rel="stylesheet" type="text/css" href="css/drs.css">
    <link rel="stylesheet" type="text/css" href="css/external-pages.css">
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
          	<a href="index.html">
                <img src="img/logo.png" alt="logo" />
            </a>
		  	<div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li><a href="index2.html#principal">Principal</a></li>
                    <li><a href="SADT.php">Empresa</a></li>
                    
                    <li><a href="atestado.php">Depoimentos</a></li>
                    <li><a href="index2.html#portfolio">Produtos</a></li>
                    <li><a href="index2.html#footer">Fale Conosco</a></li>
                    <li><a href="http://drsolution.com.br/blog">Blog</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           Mais
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#aboutus.html">Sobre nós</a></li>
                            <li><a href="index2.html#portfolio">Portfólio</a></li>
                            
                            <li><a href="coming-soon.html">Breves lançamentos</a></li>
                            <li><a href="contact.html">Contato</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                        </ul>
                    </li>
                    
                </ul>
	        </div>
        </div>
      </div>
    </div>
    <!-- ends navbar -->
	<div id="contact" class="contact_page">
        <div class="container">
        	<div class="row form">
             	<div class="span6">
                    <form class="form-horizontal" method="post" action="" id="form1">
                    	<div class="control-group">
                            <label class="control-label" for="nomeRemetente"></label>
                            <div class="controls">
                                <input type="" class="span4" id="" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="nomeRemetente"></label>
                            <div class="controls">
                                <input type="" class="span4" id="" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="nomeRemetente"></label>
                            <div class="controls">
                                <input type="" class="span4" id="" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="nomeRemetente"></label>
                            <div class="controls">
                                <input type="" class="span4" id="" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="nomeRemetente"></label>
                            <div class="controls">
                                <input type="" class="span4" id="" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="nomeRemetente"></label>
                            <div class="controls">
                                <input type="" class="span4" id="" >
                            </div>
                        </div>
                        <?php
						}
                            
                        ?>
                    </form>
                </div>
        	</div>
    	</div>
    </div>
<?php } // fecha o if do session
else {
    header("Location: login.php");
}?>  