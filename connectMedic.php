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
$cert_pem = "MIID+jCCAuKgAwIBAgIBADANBgkqhkiG9w0BAQsFADCBmTELMAkGA1UEBhMCVVMx
DjAMBgNVBAgMBVRleGFzMQ0wCwYDVQQHDARXYWNvMR0wGwYDVQQKDBRTdWNjZXNz
QnJpY2tzIEluYyBDQTEUMBIGA1UECwwLRW5naW5lZXJpbmcxEjAQBgNVBAMMCUNB
IE1hc3RlcjEiMCAGCSqGSIb3DQEJARYTc3VwcG9ydEBjbGVhcmRiLmNvbTAeFw0x
NTA3MTkxOTIwMjdaFw00MjEyMDMxOTIwMjdaMIGUMQswCQYDVQQGEwJVUzEQMA4G
A1UECAwHTm90IHNldDEQMA4GA1UEBwwHTm90IHNldDEQMA4GA1UECgwHQ2xlYXJE
QjEUMBIGA1UECwwLRW5naW5lZXJpbmcxFDASBgNVBAMMC0hlcm9rdSBVc2VyMSMw
IQYJKoZIhvcNAQkBFhRhbGFpbkBkcnNvbHV0aW9uLm9yZzCCASIwDQYJKoZIhvcN
AQEBBQADggEPADCCAQoCggEBAKv89KzqYScMcvzg8IeoOq0ZebYm9/LMWQFmBDyu
bL+/m92DLhelElKMrJLYfwhUG5KzcWczYFGNvPBVa1SBetMF3DkYipSr20miRGRZ
YCKAiet15Gt/Mj8XScSvdCvM/1YGbGcfUYBM3FZmdFhxQ6ogA/pm4f1Odcfqcq2U
A/lmag319FP1aGVjkx1R81RNeUblMR1m6BERHQq0sGpSwbtZdJ6iTp2/7JNWTPNd
b1CLU6dx8vRqa3n4P+xXRTCJ7QvJJ9JoRah1fTG1Nvag57bgwgK3atgCUQWAVQB9
0qn9TwvLGk/SQeSbVHBuxM2083SQQw1ROGmNrAs9OGi6NscCAwEAAaNQME4wHQYD
VR0OBBYEFBMDAKc23APHPZ6nTMAqIrtm0ECkMB8GA1UdIwQYMBaAFGzWDJXdqabN
Bgw23vzNmlcPPvgbMAwGA1UdEwQFMAMBAf8wDQYJKoZIhvcNAQELBQADggEBAAjs
7Vp2rGx8SBtV5dNG8ekuUY0y4Nf/oXMK+q09rkHecy9hDKpL8RorlnzWux7Rk/mF
2fciYAN1rum9hBJm6E60BJgay0JIbS4YjbvU0rriCOTa6X0pX2OpE/zhnYTFR97+
HVhk5tA5XAhhHCq9G4z561P55FA0dKomLR3JhRFBQyvduDkosYq1OsT1visxwv2X
bn5xe27YWoQAGtrvuSO0BfEDfQIOgCC/RUlVxqMTh1kEOHeMEYxokmi5dYMkPTxe
cQCx3P/L/wdWyfZvWlr7cAhhE7fqVXvUUuV9tlqjt/hvZc/l2O+zV06iwDaOKe78
fEAiVbgVVMFY9h2OfVw=";

//cert_key
$cert_key = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCr/PSs6mEnDHL8
4PCHqDqtGXm2JvfyzFkBZgQ8rmy/v5vdgy4XpRJSjKyS2H8IVBuSs3FnM2BRjbzw
VWtUgXrTBdw5GIqUq9tJokRkWWAigInrdeRrfzI/F0nEr3QrzP9WBmxnH1GATNxW
ZnRYcUOqIAP6ZuH9TnXH6nKtlAP5ZmoN9fRT9WhlY5MdUfNUTXlG5TEdZugRER0K
tLBqUsG7WXSeok6dv+yTVkzzXW9Qi1OncfL0amt5+D/sV0Uwie0LySfSaEWodX0x
tTb2oOe24MICt2rYAlEFgFUAfdKp/U8LyxpP0kHkm1RwbsTNtPN0kEMNUThpjawL
PThoujbHAgMBAAECggEADeCTPYCL5kKy5ISh49BHK8BqebAbQZQLenlozhyk2bP0
N6NmDLJdEBwZsJ+XYGyo7OVduR4EH5B4NkwuJNtttak7Y7//Lo/PWdml+xLbFu2Y
M0+H5sSUoVKXuS8PCJm54I8UIB3+zYNmI/KQYLKC6y86IvI6Od4i0sawCiFvUKg4
6bXJ5eFdUbM/Ib8/qwg5D8dqNEC6Xw70xhJ7uw4HHY2ttVQoOxV1cL4uzFDG8Fi1
1EKxox2f+Qw/eXXQkcDaoejJMHsKPlbUUwpK5gI0jAhtL7xvB5NeKBvB5dM62naC
KTbDbOA5tBZnLmHhbyCveKSDJQkJZIaozJ6AbVV+QQKBgQDfBkRCxyQ7nlvOcmWl
AhFmRxmaz8Jf8+ZdJIkJamSEAUKNCArOiRNQWI/vg9xt9+DdDyHqtQFOEnHSXwfL
BXSoVTJ5HB03f7jQklvEdtVQfTeYtgo3jVscq5fagZWi5IuCshFwAJ/jVLrjipEs
IHwqRft85QmEVOoOWEExeCUMuwKBgQDFaudaO1PsudXEbQjlpFiJH4e3C6k+7RQZ
5QtredesUa0EGi5GaTc8RKtG2gegFOghiZH5P9VoN0vr6427pDyPU6nlpW9UMTSb
GpNA6UdmgwFnpUm54AgjJF6BY++DJpbBIekT3Sf7NNuioH0raVfWSRyHunlaWMzM
ZxvtlIIDZQKBgHlZRIz9JAbYbGWRMyMsU+FNsG3eu4lQATkO5w1beWOl99sa1B56
0Sp3daHCIo8nP4+oazD02cfsG0h28puR1V6+NJ9XH8KR2TKLYCku63RHHZgW/Mor
PLcF2rNGrO+b4Rj04K4LePPNp36lZ8YVytmJiIP1b080kMHLXXWYRLh/AoGBALJS
lFPfDznfywY47zZvs0F5Z5+iOuiKQgP57szQLE6NIFl6RJ55X9litcu0Gfsxp1TT
7TVVwbD3ce7SwR3jhoh4rBixzNQh9kC8SpLxpPsmDtjOZsAta2xC59K8sJao/rfJ
p723oOu6nUJS8X2LFDqNo+W+POutFqDz6jg6Uw45AoGADi3FvejC8LSZXK7hP0M1
EzpqIx2oxsp5EV18yzdUiVMBKUk4WHU+04t9defMOvgm71q7C87EhaANb3RgKw3u
zSySahcABGnUFZIz8rpgrdHXiqgOkIz9nZWqw3V3RvAHZJOittdT7Iw+FXw27Bqd
BUrviIay7wnweHsiMIM+pvM=";

//cleardb_ca

$cleardb_ca = "MIIEBzCCAu+gAwIBAgIJAPs/TPnO24QSMA0GCSqGSIb3DQEBBQUAMIGZMQswCQYD
VQQGEwJVUzEOMAwGA1UECAwFVGV4YXMxDTALBgNVBAcMBFdhY28xHTAbBgNVBAoM
FFN1Y2Nlc3NCcmlja3MgSW5jIENBMRQwEgYDVQQLDAtFbmdpbmVlcmluZzESMBAG
A1UEAwwJQ0EgTWFzdGVyMSIwIAYJKoZIhvcNAQkBFhNzdXBwb3J0QGNsZWFyZGIu
Y29tMB4XDTExMDgwOTE5NTcxOVoXDTM4MTIyNDE5NTcxOVowgZkxCzAJBgNVBAYT
AlVTMQ4wDAYDVQQIDAVUZXhhczENMAsGA1UEBwwEV2FjbzEdMBsGA1UECgwUU3Vj
Y2Vzc0JyaWNrcyBJbmMgQ0ExFDASBgNVBAsMC0VuZ2luZWVyaW5nMRIwEAYDVQQD
DAlDQSBNYXN0ZXIxIjAgBgkqhkiG9w0BCQEWE3N1cHBvcnRAY2xlYXJkYi5jb20w
ggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQDl3xOV5yj2XkwCgMZ2H3AV
TZrGf/LhuX1EByOaoYeutBQfzb049wp4olmFhcL7ZXmsBJb3/7fYwyxs6rbJ0diz
nGFATOaEWE7yNm14gIagL6xb+Arqh9TrlF77Wts32RHIQvCAt1Sw8VeoBhWKLp96
gCC1ZRSHEdh0qaTOFXRgEUGXOmtPtwiNaDwVsaYN82a9AfhKqdygRMzAPYZk29cr
jZy13CMgz8JZIGEKRxTqbl8ClR+A6aW3Opgf6hD/vASGigGfgbjNNPeEHUUYHj8y
W3OWn7CrItdm/2TXG0xdks5VPJonHY5KdhSLobJZCyR9Oc00bT4gSOsDEKO4+t3J
AgMBAAGjUDBOMB0GA1UdDgQWBBRs1gyV3ammzQYMNt78zZpXDz74GzAfBgNVHSME
GDAWgBRs1gyV3ammzQYMNt78zZpXDz74GzAMBgNVHRMEBTADAQH/MA0GCSqGSIb3
DQEBBQUAA4IBAQATIQy8MJ9aZ4z6ourkHeY/RmkfMF2lfpknsPWkab/DpTkfQ4Zt
Av8ZP+lCYzdoBm98FJoOhLNJxgI4M1jHg4ubccoL6r+MWBUMCT5KW6zFyom9p1wY
D8dpIdzV8cTmsJTt3vrUWkC+aP2Dz3EaMHzH14JyLRxqhoOOr456y6HD4SXEwzW3
8n8N9J15Rpp6Am/y+dVEXquUf0Qj7l67ElIgDByBitV4AVUnmmu7C/Kn+GzTKFet
yLGbEXgbgalggtnUItm4nFIrcOh51xxnTNtWDNktD06/0Oss5OY901VVwSm0JmV0
LtNgymxXhQAJVDVaIAn4C0/Hh8GudcAs/QKv";




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


