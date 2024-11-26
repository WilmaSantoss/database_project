<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location:../index.html"); // Vai para a pagina de login se não tiver autenticado 
    exit();
}

// Pegando as informações da base de dados
$user_id = $_SESSION['user_id'];
include('../conexao.php');

$sql = "SELECT nome, apelido FROM utilizadores WHERE user_id = $user_id";
$result = $mysqli->query($sql);

if (!$result) {
    die("Erro ao consultar SQL: " . $mysqli->error);
}

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $apelido = $row['apelido'];
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>
    <h1 id="h1Uti" style="margin-top:70px;">Perfil do Administrador</h1>
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

            <!-- perfil do Admin -->
            <div class="row">
                <div class="col text-bg-light p-3" id="loginindexLeft">
                    <img id="fotoUti" src="../imagens/outrasImagens/post_thumbnail-5ab200837bcf0516cd370e2f9011b320.jpeg" alt="Foto de perfil"> <br><br>

                    <!-- dados de todos os utilizadores -->
                    <h3>Todos os utilizadores:</h3>
                    <div class="col text-bg-light p-3">
                        <div class="table-responsive">
                            <table class="table tabelaAgendamentos" style="margin: 0 auto; ">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Apelido</th>
                                    <th>Email</th>
                                    <th>Ações</th>
                                </tr>
                                <tr>
                                    <?php
                                    //conexão com a base de dados
                                    include('../conexao.php');

                                    //informações dos utilizadores da base de dados
                                    $user_id = $_SESSION['user_id'];
                                    $sql = "SELECT user_id, nome, apelido, email FROM utilizadores";
                                    $result = $mysqli->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $user_id = $row['user_id'];
                                            $nome = $row['nome'];
                                            $apelido = $row['apelido'];
                                            $email = $row['email'];

                                            //utilzadores cadastrados

                                            echo "<tr>";
                                            echo "<td>$user_id</td>";
                                            echo "<td>$nome</td>";
                                            echo "<td>$apelido</td>";
                                            echo "<td>$email</td>";
                                            echo "<td>";
                                            echo "<a href='editar_uti_admin.php?id=$user_id'>Editar</a> | ";
                                            echo "<a href='excluir_uti_admin.php?id=$user_id'>Excluir</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    }

                                    $mysqli->close();

                                    ?>
                                </tr>
                            </table>
                        </div>

                    </div>

                </div>

                <!-- todas as reuniões agendadas -->
                <div class="col text-bg-light p-3" id="loginindexRight">
                    <h3>Reuniões Agendadas:</h3><br>
                    <div>
                        <div class="table-responsive">
                            <table class="table tabelaAgendamentos" style="margin: 0 auto;">
                                <tr>
                                    <th>ID</th>
                                    <th>ID do Utilizador</th>
                                    <th>Data</th>
                                    <th>Horário</th>
                                    <th>Ações</th>
                                </tr>
                                <tr>
                                    <?php
                                    //conexão com a base de dados
                                    include('../conexao.php');

                                    //informações das reunioes da base de dados
                                    $user_id = $_SESSION['user_id'];
                                    $sql = "SELECT * FROM reunioes";
                                    $result = $mysqli->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $id_reuniao = $row['id_reuniao'];
                                            $user_id = $row['user_id'];
                                            $data = $row['data'];
                                            $horario = $row['horario'];

                                            echo "<tr>";
                                            echo "<td>$id_reuniao</td>";
                                            echo "<td>$user_id</td>";
                                            echo "<td>$data</td>";
                                            echo "<td>$horario</td>";
                                            echo "<td>";
                                            echo "<a href='editar_reuniao_admin.php?id=$id_reuniao'>Editar</a> | ";
                                            echo "<a href='excluir_reuniao_admin.php?id=$id_reuniao'>Excluir</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan = '5'> Nenhuma reunião cadastrada </td></tr>";
                                    }
                                    $mysqli->close();

                                    ?>
                                </tr>
                            </table> <br>
                        </div>

                    </div>



                    <!-- agendando novos projetos -->
                    <h3>Agendar Novo Projeto:</h3><br>
                    <form action="agendar_projeto_admin.php" method="post">
                        <?php 
                            include('../conexao.php');
                            $dataHoje = date("Y-m-d");                         
                        ?>
                        <input type="hidden" name="dataHoje" value="<?php echo "$dataHoje" ?>">
                        Tecnologia associada: <input type="text" name="tecAssoc" id="tecAssoc"> <br><br>
                        Status: <select name="status" id="status">
                            <option value="marcado">Marcado</option>
                            <option value="em_progresso">Em Progresso</option>
                            <option value="terminado">Terminado</option>
                        </select> <br><br>
                        <input type="submit" id="agendarProj" value="Agendar Projeto">
                        <br><br>

                    </form>

                    <!-- projetos agendados -->

                    <h3>Projetos Agendados:</h3><br>

                    <div class="table-responsive">
                        <table class="table tabelaAgendamentos" style="margin: 0 auto;">
                            <tr>
                                <th>ID do Projeto</th>
                                <th>Utilizador</th>
                                <th>Data</th>
                                <th>Tecnologia</th>
                                <th>Status Atual</th>
                                <th>Ações</th>
                            </tr>
                            <tr>
                                <?php
                                //conexão com a base de dados
                                include('../conexao.php');

                                //informações dos projetos da base de dados
                                $user_id = $_SESSION['user_id'];
                                $sql = "SELECT * FROM projetos";
                                $result = $mysqli->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $id_projeto = $row['id_projeto'];
                                        $user_id = $row['user_id'];
                                        $dataCria = $row['data_criacao'];
                                        $tecAssoc = $row['tecnologia_associada'];
                                        $status = $row['status'];

                                        //projetos agendados

                                        echo "<tr>";
                                        echo "<td>$id_projeto</td>";
                                        echo "<td>$user_id</td>";
                                        echo "<td>$dataCria</td>";
                                        echo "<td>$tecAssoc</td>";
                                        echo "<td>$status</td>";
                                        echo "<td>";
                                        echo "<a href='editar_projeto_admin.php?id=$id_projeto'>Editar</a> | ";
                                        echo "<a href='excluir_projeto_admin.php?id=$id_projeto'>Excluir</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan = '6'> Nenhuma reunião cadastrada </td></tr>";
                                }
                                $mysqli->close();

                                ?>
                            </tr>
                        </table><br><br>
                    </div>


                    <!-- botão logout -->
                    <a id="logoutbtn" href="../index.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>