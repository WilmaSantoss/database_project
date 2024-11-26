<?php 
session_start();

/* conexão com a base de dados */
$user_id = $_SESSION['user_id'];
include('../conexao.php');

if(isset($_POST['salvarAlteracoes'])){
    $nomeNovo = $_POST['novoNome'];
    $apelidoNovo = $_POST['novoApelido'];

    /* Alterando dados na base de dados */

    $sql = "UPDATE utilizadores SET nome = '$nomeNovo', apelido = '$apelidoNovo' WHERE user_id = '$user_id'";
    $resultado = mysqli_query($mysqli, $sql); 

    echo "Dados alterados com sucesso! <br>";
    echo "<a href='editar_dados_utilizador.php?id=$user_id'>VOLTAR</a>";
}

 
?>