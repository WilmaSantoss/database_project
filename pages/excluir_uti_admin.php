<?php 
session_start();

if(!empty($_GET['id'])){
    //conexão com a base de dados
    include('../conexao.php');

    $id_user = $_GET['id'];

    $sqlDeletar = "DELETE FROM utilizadores WHERE user_id = $id_user";
    $resultado = mysqli_query($mysqli, $sqlDeletar);

    echo "Utilizador Excluido! <br>";
    echo "<a href='pagina_admin.php'>VOLTAR</a>";

}
        
?>


