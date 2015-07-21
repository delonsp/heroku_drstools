<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.ico?v=2">
	<title><?= isset($pageTitle) ? $pageTitle : "Default Title"?></title>
    <!-- Additional tags here -->
    <?php if (function_exists('customPageHeader')){
      customPageHeader();
    }?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/drs.css">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <link rel="stylesheet" type="text/css" href="css/external-pages.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic" rel="stylesheet" type='text/css'>
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
    <!-- ends navbar --><!-- ends navbar --> <?php  echo "<h1 style='font-size:3em;color:white;background-color:black;'>COOKIE = {$_COOKIE['login']}</h1>";   ?>