<?php

// Nomes dos bancos de dados locais
// $DB = "drsoluti2";


// Nomes dos bancos de dados locais do heroku
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);


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





function connect() {
	
	$con=mysqli_connect($cleardb_url,$cleardb_username,$cleardb_password,$cleardb_db) or die(mysqli_connect_error());	
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


