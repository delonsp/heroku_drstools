<?php 

include("connectMedic.php");
$con=connect();

function insereDados($data, $tabela, $db, $con) {

    //include_once("connectMedic.php");

    $fields_sql = '`'.implode('`, `', array_keys($data)).'`';
    $values_sql = '\''.implode('\', \'', $data).'\'';

    

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
    
    $nomeDaReceita = mysqli_real_escape_string($con, $_POST['nomeDaReceita']);
    $nomeDaDoenca = mysqli_real_escape_string($con, $_POST['nomeDaDoenca']);
    $textoReceita = mysqli_real_escape_string($con, $_POST['textoReceita']);
    $m = mysqli_real_escape_string($con, $_POST['man']);

    $data = array("$doencaDB" => $nomeDaDoenca,
    				"$man" => $m,
    				"$nomeDaReceitaDB" => $nomeDaReceita,
    				"$descricaoDB" => $textoReceita
    				);
    insereDados($data, $tabelaReceitas, $DB, $con);

      

} else if (isset($_POST['nomeDoExame']) && !empty($_POST['nomeDoExame']) &&
            isset($_POST['descricao']) && !empty($_POST['descricao'])) {
    $nomeDoExame = mysqli_real_escape_string($con, $_POST['nomeDoExame']);
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);
    $data = array("$nomeDB" => $nomeDoExame,
                   "$descricaoDB" => $descricao  );

    insereDados($data, $tabelaExames, $DB, $con);

} else {
    echo "<div class='alert alert-danger'>Dados inválidos. Favor tentar novamente</div>";
}



 ?>