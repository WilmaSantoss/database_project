<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location:../index.html"); // Vai para a pagina de login se não tiver autenticado 
    exit();
}

// Pegando as informações da base de dados
$user_id = $_SESSION['user_id'];
include('../conexao.php');

$sql = "SELECT nome, apelido, email FROM utilizadores WHERE user_id = $user_id";
$result = $mysqli->query($sql);

if (!$result) {
    die("Erro ao consultar SQL: " . $mysqli->error);
}

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $apelido = $row['apelido'];
    $email = $row['email'];
} else {
    echo "Perfil não encontrado.";
}

$mysqli->close();
?>


<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://kit.fontawesome.com/ba47529461.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Jane Doe - Web Development</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1 id="h1Uti" style="margin-top:70px;">Perfil do Utilizador</h1>
    <p id="pUti">Olá <?php echo $nome . " " . $apelido; ?></p>

    <div class="container" id="nav-container">
        <nav class="navbar navbar-expand-lg fixed-top">
            <a href="#" class="navbar-brand">
                <img id="logo" src="../imagens/outrasImagens/dailydev-logo.webp" alt="Jane Doe Dev"> Jane Doe Dev
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-links" aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
                <div class="navbar-nav">
                    <a href="home_page.html" class="nav-item nav-link" id="home-menu">Home</a>
                    <a href="portfolio.html" class="nav-item nav-link" id="portfolio-menu">Portfólio</a>
                    <a href="orcamento.html" class="nav-item nav-link" id="orc-menu">Orçamento</a>
                    <a href="estamos_aqui.html" class="nav-item nav-link" id="contacto-menu">Estamos Aqui</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="p-3 m-0 border-0 bd-example m-0 border-0 bd-example-row">

        <div class="container text-center">

            <!-- perfil do utilizador -->
            <div class="row">
                <div  class="col text-bg-light p-3" id="loginindexLeft">
                    <img id="fotoUti"  src="../imagens/outrasImagens/10-dicas-de-saude-mental-para-mulheres-1024x768.jpg" alt="Foto de perfil"> <br><br>

                    <!-- dados do utilizador -->
                    <h3>Os teus dados:</h3>
                    <p class="dadosUti"><b>Nome: </b><?php echo $nome; ?></p>
                    <p class="dadosUti"><b>Apelido: </b><?php echo $apelido; ?></p>
                    <p class="dadosUti"><b>Email: </b><?php echo $email; ?></p>
                    <a id="editarDados" href="editar_dados_utilizador.php">
                        <p>Editar dados <i class="fa-solid fa-caret-right"></i></p>
                    </a>
                </div>

                <!-- marcação de reunião -->
                <div class="col text-bg-light p-3" id="loginindexRight">
                    <h3>Agendar reunião:</h3><br>
                    <form method="post" action="agendar_reuniao_uti.php">
                        Data da reunião: <input type="date" name="dataReuniao" id="dataReuniao"><br><br>
                        Hora da reunião: <input type="time" name="horaReuniao" id="horaReuniao"> <br><br>
                        <input type="submit" id="agendarReuniao" value="Agendar">
                    </form><br>


                    <!-- reuniões agendadas -->
                    <h3>Reuniões agendadas:</h3><br>
                    <table class="tabelaAgendamentos"style="margin: 0 auto;">
                        <tr>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Ações</th>
                        </tr>
                        <tr>
                            <?php
                            //conexão com a base de dados
                            include('../conexao.php');

                            //reunioes agendadas do usuário
                            $user_id = $_SESSION['user_id'];
                            $sql = "SELECT id_reuniao, data, horario FROM reunioes WHERE user_id = '$user_id'";
                            $result = $mysqli->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $reuniao_id = $row['id_reuniao'];
                                    $data = $row['data'];
                                    $horario = $row['horario'];

                                    //exibindo reunioes agendadas

                                    echo "<tr>";
                                    echo "<td>$data</td>";
                                    echo "<td>$horario</td>";
                                    echo "<td>";
                                    echo "<a href='editar_reuniao_utilizador.php?id=$reuniao_id'>Editar</a> | ";
                                    echo "<a href='proc_excluir_reuniao_uti.php?id=$reuniao_id'>Excluir</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan = '3'> Nenhuma consulta agendada. </td></tr>";
                            }

                            $mysqli->close();

                            ?>
                        </tr>
                    </table> <br><br><br>

                    <!-- marcação de projeto -->

                    <h3>Agendar Projeto</h3><br>    
                    <form method="post" action="agendar_projeto_uti.php">
                        <?php 
                            include('../conexao.php');
                            $dataHoje = date("Y-m-d");                         
                        ?>
                        <input type="hidden" name="dataHoje" value="<?php echo "$dataHoje" ?>">
                        Tecnologia Associada: <input type="text" name="tecAssoc" id="tecAssoc"><br><br>
                        <input type="submit" id="agendarProj" value="Agendar Projeto">
                    </form><br>

                    <!-- projetos agendados -->
                    <h3>Projetos Agendados:</h3><br>
                    <table class="tabelaAgendamentos" style="margin: 0 auto;">
                        <tr>
                            <th>Data de Criação</th>
                            <th>Tecnologia Associada</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <?php
                            //conexão com a base de dados
                            include('../conexao.php');

                            //projetos agendados do utilizador
                            $user_id = $_SESSION['user_id'];
                            $sql = "SELECT id_projeto, data_criacao, tecnologia_associada, status FROM projetos WHERE user_id = '$user_id'";
                            $result = $mysqli->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id_projeto = $row['id_projeto'];
                                    $dataCriacao = $row['data_criacao'];
                                    $tecAssoc = $row['tecnologia_associada'];
                                    $status = $row['status'];

                                    //exibindo projetos agendados
                                    
                                    echo "<tr>";
                                    echo "<td>$dataCriacao</td>";
                                    echo "<td>$tecAssoc</td>";
                                    echo "<td>$status</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan = '3'> Nenhuma consulta agendada. </td></tr>";
                            }

                            $mysqli->close();

                            ?>
                        </tr>
                    </table> <br><br><br>

                    <!-- botão logout -->
                    <a id="logoutbtn" href="../index.html">Logout</a>

                </div>
            </div>
        </div>
</body>

</html>