<?php 

include_once("connectMedic.php");

if (isset($_POST['no']) && !empty($_POST['no'])) {
	
	$id = $_POST['no'];

	$con = connect($medicDB);

	$query = "SELECT  * FROM  `$tabelaReceitas` WHERE `no`='$id'";

	$user = mysqli_query($con, $query);
    
	$name_row = mysqli_fetch_assoc($user);

	echo json_encode($name_row);

}



 ?>