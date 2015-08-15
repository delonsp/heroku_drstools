<?php

// Nomes dos campos das tabelas
$nomeDaReceitaDB="nomeDaReceita";
$descricaoDB = "descricao";
$no = "id";
$localDB="local";
$logoDB="logo";
$nomeDB = "nome";
$doencaDB = "doenca";
$man = "man";
$usuarioID = "usuario_id";
$userEmail = "user_email";
$userPass = "user_password";
$usuario = "user_name";
$global = "global";

// Nomes das tabelas
$tabelaTISS = "nosocomios";
$tabelaReceitas = "medicamentos";
$tabelaExames = "exames";
$tabelaLogos = "logosConvenios";




function connect() {
	// Dados do banco do heroku
	$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$cleardb_server = $cleardb_url["host"];
	$cleardb_username = $cleardb_url["user"];
	$cleardb_password = $cleardb_url["pass"];
	$cleardb_db = substr($cleardb_url["path"], 1);

	// certificados

	// cert_pem
	$cert_pem = getenv("CERT_PEM");


	//cert_key
	$cert_key = getenv("CERT_KEY");

	//cleardb_ca

	$cleardb_ca = getenv("CLEARDB_CA");

	
	$con = mysqli_init();
	mysqli_ssl_set($con, $cert_key, $cert_pem, $cleardb_ca, null, null);
	mysqli_real_connect($con, $cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db) or die(mysqli_connect_error($con));	
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


