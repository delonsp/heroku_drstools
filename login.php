<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.ico?v=2">
    <title>Login</title>
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
	<div id="contact" class="contact_page">
        <div class="container">
        	<div class="row form">
             	<div class="span6">
                <form class="form-horizontal" method="post" action="index.php">
                	   	<div class="control-group">
                            <label for="login" class="control-label">Login:</label>
                            <div class="controls">
                                <input type="text" class="span4" name="login" id="login" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="pass" class="control-label">Senha:</label>
                            <div class="controls">
                                <input type="password" class="span4" name="pass" id="pass"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" value="entrar" class='btn btn-info btn-large'/>
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

