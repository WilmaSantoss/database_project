<?php
session_start();

/* conexão com a base de dados */
include('../conexao.php');

if (isset($_POST['salvarAlteracoes'])) {

    $id_user = $_POST['idUtilizador'];
    $novoNome = $_POST['novoNome'];
    $novoApelido = $_POST['novoApelido'];
    $novoEmail = $_POST['novoEmail'];

    /* Alterando dados na base de dados */

    $sql = "UPDATE utilizadores SET nome = '$novoNome', apelido = '$novoApelido', email = '$novoEmail' WHERE user_id = '$id_user'";
    $resultado = mysqli_query($mysqli, $sql);       

    echo "Dados do utilizador alterado! <br>";
    echo "<a href='editar_uti_admin.php?id=$id_user'>VOLTAR</a>";
} else {
    echo "Erro: Verifique se os dados já estão cadastrados no sistema . <br>";
    echo "<a href='pagina_admin.php'>VOLTAR</a>";
}
  
    

            

