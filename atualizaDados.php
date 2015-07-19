<?php 

include("connectMedic.php");

function atualizaDados($atualiza, $id, $db, $tabela) {

    $con=connect($db);

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

    
    $nomeDaReceita = $_POST['nomeDaReceita'];
    $nomeDaDoenca = $_POST['nomeDaDoenca'];
    $textoReceita = $_POST['textoReceita'];
    $m = $_POST['man'];
    $id = $_POST['no'];

    $atualiza = "`$nomeDaReceitaDB`='$nomeDaReceita',
                                        `$doencaDB`='$nomeDaDoenca',
                                        `$descricaoDB` = '$textoReceita',
                                        `$man` = '$m'";
    

    atualizaDados($atualiza, $id, $DB, $tabelaReceitas);
    

} else if (isset($_POST['nomeDoExame']) && !empty($_POST['nomeDoExame']) &&
            isset($_POST['descricao']) && !empty($_POST['descricao']) &&
            isset($_POST['no']) && !empty($_POST['no'])) {

    $nomeDoExame = $_POST['nomeDoExame'];
    $descricao = $_POST['descricao'];
    $id = $_POST['no'];
    $atualiza = "`$nomeDB`='$nomeDoExame',`$descricaoDB`='$descricao'";

    atualizaDados($atualiza, $id, $DB, $tabelaExames);

} else {

    echo "<div class='alert alert-danger'>Dados inválidos. Favor tentar novamente</div>";
}



 ?>