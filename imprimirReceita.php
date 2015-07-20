<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="css/medicStyle.css" type="text/css" />

<title>Receituário Médico</title>
</head>
<body>
<div id="receitaContainer">
    
    <?php
    
    if(isset($_POST['receitas']) && !empty($_POST['receitas'])) {
        

        $logo = "imgMedic/";
        if (!$_POST['logo2']) {
            $logo .= "medico.png";
        } else {
            $logo .= $_POST['logo2'];
        }
        $nome = strtoupper($_POST['nomeDoPaciente2']);
        $end = $_POST['endDoPaciente2'];
        $tels = $_POST['telsDoPaciente2'];        

        // $receitas = trim($_POST['receitas']);
        // echo nl2br($receitas);
        
        ?>

        <table>
            <tr><td style="align: center; text-align: center;"><img width=220 src="<?php echo $logo; ?>"/></td></tr>
            <tr><td class="htitle">Receitu&aacute;rio M&eacute;dico</td></tr>
            <tr><td></td></tr>
            <tr><td class="htitle2">Identifica&ccedil;&atilde;o do Emitente</td></tr>
            <tr><td class="tdh">
            <dl>
            <dt>Nome:</dt><dd>Dr. Alain Machado Dutra - Urologista Titular da Sociedade Brasileira de Urologia desde 2002</dd>
            <dt>CRM-SP:</dt><dd>102211</dd>
            <dt>Email:</dt><dd>alain.uro@gmail.com</dd>
            <dt>Site:</dt><dd>http://alainuro.com</dd>
            <dt>Endere&ccedil;o:</dt><dd><?php echo $_POST['nomeClinica2']; ?></dd>
            
            </dl>
            </td></tr>
            <tr><td></td></tr>
            <tr><td class="htitle2">Identifica&ccedil;&atilde;o do Paciente</td></tr>
            <tr><td class="tdh">
            <dl>
            <dt>Nome:</dt><dd><b><?php echo $nome; ?></b></dd>
            <dt>Endereço:</dt><dd><?php echo $end; ?></dd>
            <?php if (!$_POST['endDoPaciente2']) {
                echo("</br>");
            } ?>
            <dt>Telefones:</dt><dd><?php echo $tels; ?></dd>
            </dl>
            </td></tr>
        
        </table>

        <br/><br/>

        <?php
             $receitas = nl2br(trim($_POST['receitas']))."</br></br>";

             echo $receitas;
             

             $receitas = "<h4>Nome do Paciente: {$nome}</h4>&#13;&#10;".
                                    "<p>tels: {$tels}&#13;&#10;<p>".
                                    "<p>Endereço: {$end}&#13;&#10&#13;&#10</p>". $receitas;
             
        ?>

        <div id="signature">
                <hr/>
                
                <?php
                date_default_timezone_set('America/Sao_Paulo');
                setlocale(LC_ALL, "pt_BR.utf-8","pt_BR", "portuguese_Brazil");
                $date_string = strftime('%d de %B de %Y');
                if($_POST['colocar_data']) {
                    echo("São Paulo, $date_string ");
                }
                ?>
        </div>

        <?php if (isset($_POST['man'])) { ?>

        <form method="post" name="form" id="form" action="enviarEmail.php" >
            <input type="hidden" id="receitas2" name="receitas2" value='<?php echo $receitas; ?>' />
            <input type="hidden" id="email_medformula2" name="email_medformula2" value='<?php echo $_POST['email_medformula'] ?>'/>
            <input type="hidden" id="email_newFarma2" name="email_newFarma2" value='<?php echo $_POST['email_newFarma'] ?>'/>
            
            
        </form>
        
        <?php } // closes the if that verifies if it is manipulated ?>
        
        
        
        <?php
            
        } else {
            die('corrupted data');  
        }
    
        ?>
        
  
</div>
<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    $(function() {
        
        $('body').on("keypress", function(e) {            
        
            if (e.keyCode == 13) {
        
                // Cancel the default action on keypress event
                
                e.preventDefault();
                window.print(); 
                
                if ($('form').length) {
                    $('form').submit();
                } else {
                    
                    window.location="medicamentos.php";
                }
            }
        });

          $('body').on("click", function() {            
                                 
                window.print(); 
                
               if ($('form').length) {

                   $('form').submit();
                } else {
                    
                    window.location="medicamentos.php";
                }
                          
        });

         
        
        
    });
</script>
</body>
</html>