<?php 
session_start();

/* conexão com a base de dados */
$user_id = $_SESSION['user_id'];
include('../conexao.php');  

/* Incluindo projeto na base de dados */
$dataCriac = $_POST['dataHoje'];
$tecAssoc = $_POST['tecAssoc'];
$status = $_POST['status'];

$sql = "INSERT INTO caso_pratico_php.projetos (user_id, data_criacao, tecnologia_associada, status) VALUES ('$user_id', '$dataCriac','$tecAssoc', '$status')";

$resultado = mysqli_query($mysqli, $sql);
echo "Projeto Marcado!<br><br>";
echo "<a href='pagina_admin.php'>VOLTAR</a>";
?>