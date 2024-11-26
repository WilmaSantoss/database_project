<?php 
    session_start();

    /* conexão com a base de dados */
    include('../conexao.php');
    
    if (isset($_POST['salvarAlteracoes'])) {
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obter a data do formulário
            $dataInicial = $_POST['novaDataReuniao'];
            $data = strtotime($dataInicial);
    
            // Obter a data e hora atual
            $dataAtual = time();
    
            // Calcular a diferença em horas
    
            $diferencaHoras = ($data - $dataAtual) / 3600;
    
            // Verificar se a diferença está dentro do limite de 72 horas
            if ($diferencaHoras > 72) {
    
                $id_reuniao = $_POST['idReuniao'];
                $novaData = $_POST['novaDataReuniao'];
                $novaHora = $_POST['novaHoraReuniao'];
    
                /* Alterando dados na base de dados */
    
                $sql = "UPDATE reunioes SET data = '$novaData', horario = '$novaHora' WHERE id_reuniao = '$id_reuniao'";
                $resultado = mysqli_query($mysqli, $sql);
    
                echo "Data da reunião alterada com sucesso! <br>";
                echo "<a href='editar_reuniao_utilizador.php?id=$id_reuniao'>VOLTAR</a>";
            } else {
                echo "Erro: A data só pode ser modificada até 72 horas antes da reunião . <br>";
                echo "<a href='pagina_utilizador.php'>VOLTAR</a>";
            }
        }
    }
    
?>
