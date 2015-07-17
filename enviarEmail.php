<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="css/medicStyle.css" type="text/css" />
<title>Email enviado</title>
</head>

<body>
<?php

require("phpmailer/class.phpmailer.php");


if(isset($_POST['receitas2']) && !empty($_POST['receitas2'])) {
	
	
	$mail = new PHPMailer();

	$mail->IsSMTP();                                      // Set mailer to use SMTP
	$mail->Host     = "srv58.hosting24.com";
	$mail->Port     = 465;
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'alain_urologista@drsolutionapp.info';                            // SMTP username
	$mail->Password = 'pto2phil';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
	
	
	$mail->From = 'alain_urologista@drsolutionapp.info';
	$mail->FromName = 'Alain Dutra';
	$mail->AddAddress('alain.uro@gmail.com');
	$mail->AddAddress('delonsp.ad272@m.evernote.com');
	if(!empty($_POST['email_medformula2'])) {
		
		$mail->AddBCC('salveso@gmail.com');
		$mail->AddBCC('formulas200@gmail.com'); // Add a recipient
	}
	
	if(!empty($_POST['email_newFarma2'])) {
		$mail->AddBCC('gloria.maranconi@hotmail.com');
		$mail->AddBCC('sac@newfarma.far.br');
		$mail->AddBCC('sacnewfarma@terra.com.br');
		 // Add a recipient
	}

	

	$mail->AddReplyTo('alain.uro@gmail.com', 'reply');
	$texto = nl2br($_POST['receitas2']);
	//$mail->AddCC('');
	//$mail->AddBCC('');
	
	$mail->WordWrap = 50;      
	$mail->IsHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = 'Receita de Paciente @receitas_enviadas';
	$mail->Body    =  "<!DOCTYPE html>
		<html lang='pt-br'>
		    <head>
			<meta charset=\"utf-8\">
			<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
			<title>Receita manipulada</title>
	
		    </head>
		    <body>
		    {$texto}
		    
		    </body>
	    </html>";
   
	if(!$mail->Send()) {
	  echo 'Message was not sent.';
	  echo 'Mailer error: ' . $mail->ErrorInfo;
	  echo '<br/><br/><a href="medicamentos.php" title="Retornar" alt="Retornar">Retornar</a>';
	} else {
	  die('<script type="text/javascript">window.location="medicamentos.php?man=1";</script>');
	}
} else {
	die('corrupted data');
}
?>

</body>
</html>
