<?php

// Nomes dos bancos de dados
$medicDB = "drsoluti2_medicamentos";
$examDB = "drsoluti2_exames";

// Nomes dos campos das tabelas
$nomeDaReceitaDB="nomeDaReceita";
$descricaoDB = "descricao";
$no = "no";
$localDB="local";
$logoDB="logo";
$nomeDB = "nome";
$doencaDB = "doenca";
$man = "man";
$userId = "user_id";
$userEmail = "user_email";
$userPass = "user_password";

// Nomes das tabelas
$tabelaTISS = "codigosTISS";
$tabelaReceitas = "bancoDeReceitas";
$tabelaExames = "relExames";
$tabelaUser = 'user_system';





function connect($db) {
	
	$con=mysqli_connect('localhost','not_root','not_root',$db) or die(mysqli_connect_error());	
	mysqli_set_charset($con,'utf8');
	return $con;
}

function my_mysqli_result($res, $row, $field=0) { 
    $res->data_seek($row); 
    $datarow = $res->fetch_array(); 
    return $datarow[$field]; 
} 


function justTheName($aString) {
 $bArray = explode(".", $aString);
 $bString = $bArray[0];
 return $bString;
}


