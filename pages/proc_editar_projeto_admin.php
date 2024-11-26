<?php 
session_start();

/* conexão com a base de dados */
include('../conexao.php');

if(isset($_POST['salvarAlteracoes'])){
    $id_projeto = $_POST['idProjeto'];
    $novaTec = $_POST['novaTec'];
    $novoStatus = $_POST['statusNovo'];

    /* Alterando dados na base de dados */

    $sql = "UPDATE projetos SET tecnologia_associada = '$novaTec', status = '$novoStatus' WHERE id_projeto = '$id_projeto'";
    $resultado = mysqli_query($mysqli, $sql); 

    echo "Projeto alterado com sucesso! <br>";
    echo "<a href='editar_projeto_admin.php?id=$id_projeto'>VOLTAR</a>";
}

 
?>