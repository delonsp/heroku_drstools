<?php 

include_once("connectMedic.php");

if (isset($_POST['no']) && !empty($_POST['no']) &&
	isset($_POST['bd']) && !empty($_POST['bd']) &&
	isset($_POST['tabela']) && !empty($_POST['tabela'])) {
		
	$con = connect($bd);

	$id = mysqli_real_escape_string($con, $_POST['no']);
	$tabela = mysqli_real_escape_string($con, $_POST['tabela']);
	$bd = mysqli_real_escape_string($con, $_POST['bd']);


	$query = "SELECT  * FROM  `$tabela` WHERE `no`='$id'";

	$user = mysqli_query($con, $query);
    
	$name_row = mysqli_fetch_assoc($user);

	echo json_encode($name_row);

}



 ?>