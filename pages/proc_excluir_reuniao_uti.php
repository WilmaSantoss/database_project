<?php 
session_start();

if(!empty($_GET['id'])){

    /* conexão com a base de dados */
    include('../conexao.php');

    $id_reuniao = $_GET['id'];

    $sqlSelecionar = "SELECT * FROM reunioes WHERE id_reuniao = $id_reuniao";
    $resultado = $mysqli->query($sqlSelecionar);

    if ($resultado ->num_rows == 1) {
        // Obter a data do formulário
        $row = $resultado->fetch_assoc();
        $dataDB = $row['data'];
 
        $data = strtotime($dataDB);

        // Obter a data e hora atual
        $dataHoje= time();

        // Calcular a diferença em horas

        $diferencaHoras = ($data - $dataHoje) / 3600;

        // Verificar se a diferença está dentro do limite de 72 horas
        if ($diferencaHoras > 72) {

            /* excluindo dados na base de dados */

            $sqlDeletar = "DELETE FROM reunioes WHERE id_reuniao = $id_reuniao";
            $resultado = mysqli_query($mysqli, $sqlDeletar);

            echo "Reunião excluida! <br>";
            echo "<a href='pagina_utilizador.php'>VOLTAR</a>";
        } else {
            echo "Erro: Não foi possível concluir a solicitação. Só é permitido excluir até 72 horas antes da reunião . <br>";
            echo "<a href='pagina_utilizador.php'>VOLTAR</a>";
        }
    }
}

?>


