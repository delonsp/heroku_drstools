<?php 


function pesquisaDados($array) {
	include_once("connectMedic.php");

	$query = "";

	if (sizeof($array)>1) {
		$principio = $array[0];
		$m = $array[1];
		$query="SELECT  * FROM  `$tabelaReceitas` WHERE `$descricaoDB` LIKE '%$principio%' AND `$man`= '$m' ORDER BY `$nomeDaReceitaDB`";
		// SELECT  * FROM  `$tabelaReceitas` WHERE `$descricaoDB` LIKE '%$principio%' AND `$man`= $m ORDER BY `$nomeDaReceitaDB`
		$aviso1 = "Foram encontradas as seguintes receitas cuja composição inclui o mesmo principio ativo:";
		$aviso2 = "Nome da Receita:";
		$row1 = "nomeDaReceita";
		$row2 = "descricao";
		
	} else {
		$nomeDoExame = $array[0];
		$query="SELECT * FROM `$tabelaExames` WHERE `$descricaoDB` LIKE  '%$nomeDoExame%' ORDER BY `$nome`";
		// SELECT  * FROM `relExames` WHERE `descricao` LIKE '%nomeDoExame%' ORDER BY `nome`
		$aviso1 = "Foram encontradas os seguintes exames que incluem a palavra chave inserida:";
		$aviso2 = "Nome do Exame:";
		$row1 = "nome";
		$row2 = "descricao";
	}

	$con=connect($medicDB);

	$name = mysqli_query($con, $query) or die(mysqli_error($con));

	if (mysqli_num_rows($name)) {
		echo '<div class="alert alert-success">';
		echo "<h4>$aviso1</h4>";
	    echo '</div>';

		while ($name_row = mysqli_fetch_assoc($name)) {
			echo '<div class="modalDiv">';
			echo "<p>$aviso2".$name_row[$row1]."</p>";
			echo "<p>Descricao: "."<pre>".$name_row[$row2]."</pre>";
			echo '<button class="btn btn-warning btn-lg" id="'.$name_row['no'].'">Editar</button>'."</p>";
			echo '</div>';
			echo "<hr/>";
		}

	} else {
		echo 'none';
	}


}
   
if( isset($_POST['principio']) && !empty($_POST['principio']) ) {
    
    $principio = $_POST['principio'];
    $m = $_POST['man'];
    $array = array($principio, $m);

    pesquisaDados($array);

    
	
} else if( isset($_POST['descricao']) && !empty($_POST['descricao']) ) {

	$descricao = $_POST['descricao'];
	$array = array($descricao);

	pesquisaDados($array);
	
} else {
	echo "Dados inválidos.";
}     
                                    
?>
