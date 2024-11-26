<?php 
session_start();

/* conexão com a base de dados */
$user_id = $_SESSION['user_id'];
include('../conexao.php');  

/* Incluindo reunião na base de dados */
$data = $_POST['dataReuniao'];
$hora = $_POST['horaReuniao'];

$sql = "INSERT INTO caso_pratico_php.reunioes (user_id, data, horario) VALUES ('$user_id', '$data', '$hora')";

$resultado = mysqli_query($mysqli, $sql);
echo "Reunião agendada!<br><br>";
echo "<a href='pagina_utilizador.php'>VOLTAR</a>";
?>