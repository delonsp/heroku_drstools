<?php 
	include_once("connectMedic.php");
	
	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="css/medicStyle.css" type="text/css" />
<script language="javascript" type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<title>Atestado</title>
</head>
<body>
<div id="receitaContainer">
    
    <?php
	
    if(isset($_POST['nomeDoPaciente']) && !empty($_POST['nomeDoPaciente'])
	&& isset($_POST['nomeClinica']) && !empty($_POST['nomeClinica'])
	&& isset($_POST['tipoAtestado']) && !empty($_POST['tipoAtestado'])) {

		//if($_COOKIE['nome'] != $_POST['nomeDoPaciente'] ) { setcookie('nome', $_POST['nomeDoPaciente'], time() + 600); }
        //if($_COOKIE['local'] != $_POST['nomeClinica'] ) { setcookie('local', $_POST['nomeClinica'], time() + 600); }
        //ob_end_flush();

		
		$con = connect();

		
        $nomeClinica = $_POST['nomeClinica'];
        $logo = mysqli_query($con, "SELECT `$logoDB` FROM $tabelaTISS WHERE `$localDB` = '$nomeClinica' ");
        $logo = $logo->fetch_assoc()[$logoDB]; 
        if ($logo) {
        	$logo = "imgMedic/".$logo;
        	
        } else {
        	$logo = "imgMedic/medico.png";
        }

        date_default_timezone_set('America/Sao_Paulo');
		setlocale(LC_ALL, "pt_BR.utf-8", "pt_BR", "portuguese");
		$date_string = strftime('%d de %B de %Y');
		if ($_POST['adiciona']=="") $_POST['adiciona']="0";
		?>
        
        <table>
		 	<tr><td style="align: center; text-align: center;"><img width=220 src="<?php echo $logo; ?>"/></td></tr>
		 	<tr><td class="htitle">Atestado M&eacute;dico</td></tr>
		 	<tr><td></td></tr>
		 	<tr><td class="htitle2">Identifica&ccedil;&atilde;o do Emitente</td></tr>
		 	<tr><td class="tdh">
		 	<dl>
		 	<dt>Nome:</dt><dd>Dr. Alain Machado Dutra - Urologista Titular da Sociedade Brasileira de Urologia desde 2002</dd>
		 	<dt>CRM-SP:</dt><dd>102211</dd>
		 	<dt>Email:</dt><dd>alain.uro@gmail.com</dd>
                        <dt>Site:</dt><dd>http://alainuro.com</dd>
		 	<dt>Endere&ccedil;o:</dt><dd><?php echo $_POST['nomeClinica']; ?></dd>
		 	<dd><?php echo $_POST['logo2']; ?></dd>
		 	</dl>
		 	</td></tr>
		 	<tr><td></td></tr>
		 	<tr><td class="htitle2">Identifica&ccedil;&atilde;o do Paciente ou Acompanhante</td></tr>
		 	<tr><td class="tdh">
		 	<dl>
		 	<dt>Nome:</dt><dd><b><?php echo strtoupper($_POST['nomeDoPaciente']); ?></b></dd>

		 	</dl>
		 	</td></tr>
	 	
 		</table>




        <?php 

        	$trail = "";

        	if ($_POST['tipoAtestado'] == 'Acompanhante') {
        		$text = "O Sr.(a) acima esteve acompanhando o(a) paciente ________________________________".
        		"______________ em consulta médica urológica, na data de ".$date_string. ". ";
        		
        	} else {
        		$text = "O(A) paciente acima foi atendido(a) na data de ".$date_string. ". ";
        		$trail = "Veio para consulta médica urológica.";
        	}
        	
        	if ($_POST['horaDeChegada'] && $_POST['horaDeChegada'] != '') {
				$text .= " Chegou as ".$_POST['horaDeChegada']. " hs. ";
			}
			$text .= "Deixou o consultório no horário das ". strftime("%H:%M", strtotime("+".$_POST['adiciona']." minutes")). " hs. ";
			 
			$text .= $trail;
			echo "<h3>".$text."</h3>";

         ?>
         
		<br>

        <?php if ($_POST['tipoAtestado'] == 'Atestado de Academia') {
        	echo "<h3>Foi por mim examinado e se encontra na presente data hígido e apto para a realização de atividades físico-esportivas</h3>";
        } 
        	if ($_POST['tipoAtestado'] == 'Vários dias') {
        		echo "<h3>Deverá ficar afastado por ______ dias a partir da presente data devido a _______________________________________</h3>";

        	}

        	if ($_POST['tipoAtestado'] != 'Atestado de Academia' && $_POST['tipoAtestado'] != 'Vários dias'
        		 && $_POST['tipoAtestado'] != 'Acompanhante') {
        		echo "<h3>Devendo: ". $_POST['tipoAtestado']. "</h3>";
        	}

        ?>

        <br/>
        <p>CID: <?php echo $_POST['cid']; ?></p>
        <br />
        <br />

        <div id="signature">
        	<hr/>
			<?php
		        echo("São Paulo, $date_string ");
			?>
        </div>
       
        
    	
        <script>


        	$(function() {
                                
			   $('body').on("keypress", function(e) {            
				
					if (e.keyCode == 13) {
									
					// Cancel the default action on keypress event
											
					  e.preventDefault(); 
											
					  window.print(); 

			          location.replace('atestado.php');
											
					};
			    });
		                                         

		            $('body').on("click", function() {
		                                       
		                window.print(); 
		                window.location.replace('atestado.php');
		            });
         	 });

			
    
	
		</script>
        
		<?php
            
		} else {
			die('corrupted data');	
		}
    
    	?>
        
  
</div>
</body>
</html>