<?php 
session_start();

if(!empty($_GET['id'])){
    //conexão com a base de dados
    include('../conexao.php');

    $id_reuniao = $_GET['id'];

    $sqlDeletar = "DELETE FROM reunioes WHERE id_reuniao = $id_reuniao";
    $resultado = mysqli_query($mysqli, $sqlDeletar);

    echo "Reuniao Excluida! <br>";
    echo "<a href='pagina_admin.php'>VOLTAR</a>";

}
        
?>