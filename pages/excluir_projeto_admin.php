<?php 
session_start();

if(!empty($_GET['id'])){
    //conexão com a base de dados
    include('../conexao.php');

    $id_projeto = $_GET['id'];

    $sqlDeletar = "DELETE FROM projetos WHERE id_projeto = $id_projeto";
    $resultado = mysqli_query($mysqli, $sqlDeletar);

    echo "Projeto Excluido! <br>";
    echo "<a href='pagina_admin.php'>VOLTAR</a>";

}
        
?>