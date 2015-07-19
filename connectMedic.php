<?php

// Nomes dos bancos de dados locais
// $DB = "drsoluti2";


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




// Nomes dos campos das tabelas
$nomeDaReceitaDB = "nomeDaReceita";
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

echo "<br><br>";
echo "cleardb_server = $cleardb_server<br>";
echo "us-cdbr-iron-east-02.cleardb.net";
echo "cleardb_username = $cleardb_username<br>";
echo "cleardb_password = $cleardb_password<br>";
echo "cleardb_db = $cleardb_db<br>";



function connect() {
	$con = mysqli_init();
	mysqli_ssl_set($con, $cert_key, $cert_pem, $cleardb_ca, null, null);
	mysqli_real_connect($con, "us-cdbr-iron-east-02.cleardb.net", "b19eb6acaf07d4", "40332e46", "heroku_65f64762b6fda2f") or die(mysqli_connect_error($con));	
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


