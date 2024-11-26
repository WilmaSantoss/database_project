<?php 
session_start();

/* conexão com a base de dados */
if(!empty($_GET['id'])){
    include('../conexao.php');

    $id_reuniao = $_GET['id'];

    /* Pegando os dados atuais do banco de dados */

    $sqlSelect = "SELECT * FROM reunioes WHERE id_reuniao = $id_reuniao";
    $result = $mysqli->query($sqlSelect);

    $row = $result->fetch_assoc();
    $dataAtual = $row['data'];
    $horarioAtual = $row['horario'];

}

?>


<!DOCTYPE html>
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
    <link rel="stylesheet" href="../css/Estilo.css">
</head>

<body>
    <div class="p-3 m-0 border-0 bd-example m-0 border-0 bd-example-row">
        <div class="container text-center" id="editarDados">
            <div class="row row-cols-2">
                <div class="col text-bg-light p-3" id="editarDados2">
                    <form method="post" action="proc_editar_reuniao_uti.php">
                        <h2>Editar Reunião</h2>
                        <input type="hidden" name="idReuniao" id="idReuniao" value="<?php echo $id_reuniao?>">
                        <label>Nova data da Reunião: </label><input type="date" name="novaDataReuniao" id="novaDataReuniao" value="<?php echo $dataAtual?>"> <br>
                        <label>Novo horario da reunião:</label><input type="time" name="novaHoraReuniao" id="novaHoraReuniao" value="<?php echo $horarioAtual?>"> <br><br>
                        <input id="salvarAlteracoes" type="submit" name="salvarAlteracoes" value="Salvar Alterações"> <br><br>
                    </form>

                    <a href="pagina_utilizador.php?id=$user_id">Voltar para o perfil <i class="fa-solid fa-caret-right"></i></a>
                </div>
            </div>
        </div>
</body>

</html>