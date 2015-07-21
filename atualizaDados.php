<?php 

include("connectMedic.php");

function atualizaDados($atualiza, $id, $db, $tabela, $con) {

    //UPDATE `relExames` SET `nome`='estudo urodinamico', `descricao` = 'estudo urodinâmico completo.' WHERE `no`='14' LIMIT 1

    $query="UPDATE `$tabela` SET $atualiza WHERE `no`='$id' LIMIT 1";


    if (mysqli_query($con, $query)) {
        echo "<p>Medicamento atualizado no banco de dados com sucesso.</p>";
    } else {
        echo "<div class='alert alert-danger'>";
        echo "<p>Ocorreu o erro abaixo na inserção do medicamento. Favor tentar nunca mais.</p>";
        echo "</div>";
        echo mysqli_error($con);
    }
}

if( isset($_POST['nomeDaReceita']) && !empty($_POST['nomeDaReceita']) &&
    isset($_POST['nomeDaDoenca']) && !empty($_POST['nomeDaDoenca']) &&
    isset($_POST['textoReceita']) && !empty($_POST['textoReceita']) &&
    isset($_POST['man']) &&
    isset($_POST['no']) && !empty($_POST['no'])) {

    $con=connect();

    $nomeDaReceita = mysqli_real_escape_string($con, $_POST['nomeDaReceita']);
    $nomeDaDoenca = mysqli_real_escape_string($con, $_POST['nomeDaDoenca']);
    $textoReceita = mysqli_real_escape_string($con, $_POST['textoReceita']);
    $m = mysqli_real_escape_string($con, $_POST['man']);
    $id = mysqli_real_escape_string($con, $_POST['no']);

    $atualiza = "`$nomeDaReceitaDB`='$nomeDaReceita',
                                        `$doencaDB`='$nomeDaDoenca',
                                        `$descricaoDB` = '$textoReceita',
                                        `$man` = '$m'";

   
    

    atualizaDados($atualiza, $id, $DB, $tabelaReceitas, $con);
    

} else if (isset($_POST['nomeDoExame']) && !empty($_POST['nomeDoExame']) &&
            isset($_POST['descricao']) && !empty($_POST['descricao']) &&
            isset($_POST['no']) && !empty($_POST['no'])) {

    $con=connect();

    $nomeDoExame = mysqli_real_escape_string($con, $_POST['nomeDoExame']);
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);
    $id = mysqli_real_escape_string($con, $_POST['no']);
    $atualiza = "`$nomeDB`='$nomeDoExame',`$descricaoDB`='$descricao'";

    atualizaDados($atualiza, $id, $DB, $tabelaExames, $con);

} else {

    echo "<div class='alert alert-danger'>Dados inválidos. Favor tentar novamente</div>";
}



 ?>