<?php
include_once("connectMedic.php");
include("ChecaSessao.php");

if(isset($_SESSION['logged_in'])) { 
    
?>        

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.ico?v=2">
    <title>Atestado</title>
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

    ?>
    <h2 class="section_header2">Atestado Médico</h2>
	<div id="contact" class="contact_page">
        <div class="container">
        	<div class="row form">
             	<div class="span12">
                    <form class="form-horizontal" method="post" action="imprimirAtestado.php" id="form">
                    	<div class="control-group">
                            <label class="control-label" for="nomeDoPaciente">Nome do Paciente:</label>
                            <div class="controls">
                                <?php if ($nome) { ?>
                                    <input type="text" class="span4" id="nomeDoPaciente" value="<?php echo $nome ?>" size="30" name="nomeDoPaciente" >
                                <?php } else { ?>
                                    <input type="text" class="span4" id="nomeDoPaciente" esize="30" name="nomeDoPaciente" >
                                <?php } ?>
                            </div>
                        </div>
                       
                        <div class="control-group">
                            <label class="control-label" for="cid">CID:</label>
                            <div class="controls">
                                <input type="text" value="N20.0"class="span4" id="cid" size="5" name="cid" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="nomeClinica">Clinica:</label>
                            <div class="controls">
                                <select class="span4" id="nomeClinica" name="nomeClinica" size="5" >
                                <?php
                                $con = connect();
                				
								$name = mysqli_query($con, "SELECT  `$localDB` FROM  $tabelaTISS ORDER BY `$localDB`") or die(mysqli_error($con));
								while ($name_row = mysqli_fetch_assoc($name)) {
									
									$selectItem = nl2br($name_row[$localDB]);
						
									if ($name_row[$localDB] == $local) {
                                        echo "<option value='".$selectItem."' selected>".$selectItem."</option>";
                                    }
                                    else {
                                        echo "<option value='".$selectItem."'>".$selectItem."</option>";
                                    }
								} 
							
								?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="tipoAtestado">Tipo:</label>
                            <div class="controls">
                                <select class="span4" id="tipoAtestado" name="tipoAtestado" size="2" >
                                    <option value="Retornar ao trabalho.">horas</option>
                                    <option value="Acompanhante">acompanhante</option>
                                    <option value="Permanecer em repouso o resto do dia">do dia</option>
                                    <option value="Vários dias">Vários dias</option>
                                    <option value="Atestado de Academia">Atestado de Academia</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="horaDeChegada">Hora de chegada:</label>
                            <div class="controls">
                                <input type="text" class="span4" id="horaDeChegada" name="horaDeChegada">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="adiciona">Minutos a mais:</label>
                            <div class="controls">
                                <input type="text" class="span4" id="adiciona" name="adiciona" >
                            </div>
                        </div>
                        <div class="control-group">
                        	<div class="controls">
                            <input type='submit' class='btn btn-info btn-large' value='enviar'>
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
 