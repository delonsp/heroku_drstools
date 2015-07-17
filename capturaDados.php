<?php 

include_once("connectMedic.php");

if (isset($_POST['no']) && !empty($_POST['no']) &&
	isset($_POST['bd']) && !empty($_POST['bd']) &&
	isset($_POST['tabela']) && !empty($_POST['tabela'])) {
	
	$id = $_POST['no'];
	$tabela = $_POST['tabela'];
	$bd = $_POST['bd'];

	$con = connect($bd);

	$query = "SELECT  * FROM  `$tabela` WHERE `no`='$id'";

	$user = mysqli_query($con, $query);
    
	$name_row = mysqli_fetch_assoc($user);

	echo json_encode($name_row);

}



 ?>