<?php 

include("connectMedic.php");

function insereDados($data, $tabela, $db) {

    //include_once("connectMedic.php");

    $fields_sql = '`'.implode('`, `', array_keys($data)).'`';
    $values_sql = '\''.implode('\', \'', $data).'\'';

    $con=connect();

    $query = "INSERT INTO `$tabela` ($fields_sql) VALUES ($values_sql)";

    //echo $query;

    if (mysqli_query($con, $query)) {
        echo "<p>Medicamento inserido no banco de dados com sucesso.</p>";
    } else {
        echo "<div class='alert alert-danger'>";
        echo "<p>Ocorreu o erro abaixo na inserção do medicamento. Favor tentar novamente.</p>";
        echo "</div>";
        echo mysqli_error($con);
    }
}

if( isset($_POST['nomeDaReceita']) && !empty($_POST['nomeDaReceita']) &&
    isset($_POST['nomeDaDoenca']) && !empty($_POST['nomeDaDoenca']) &&
    isset($_POST['textoReceita']) && !empty($_POST['textoReceita'])) {
    
    $nomeDaReceita = $_POST['nomeDaReceita'];
    $nomeDaDoenca = $_POST['nomeDaDoenca'];
    $textoReceita = $_POST['textoReceita'];
    $m = $_POST['man'];

    $data = array("$doencaDB" => $nomeDaDoenca,
    				"$man" => $m,
    				"$nomeDaReceitaDB" => $nomeDaReceita,
    				"$descricaoDB" => $textoReceita
    				);
    insereDados($data, $tabelaReceitas, $DB);

      

} else if (isset($_POST['nomeDoExame']) && !empty($_POST['nomeDoExame']) &&
            isset($_POST['descricao']) && !empty($_POST['descricao'])) {
    $nomeDoExame = $_POST['nomeDoExame'];
    $descricao = $_POST['descricao'];
    $data = array("$nomeDB" => $nomeDoExame,
                   "$descricaoDB" => $descricao  );

    insereDados($data, $tabelaExames, $DB);

} else {
    echo "<div class='alert alert-danger'>Dados inválidos. Favor tentar novamente</div>";
}



 ?>