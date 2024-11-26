<?php 
/* conexão com a base de dados */
if(!empty($_GET['id'])){
    include('../conexao.php');

    $id_projeto = $_GET['id'];

    /* Pegando os dados atuais do banco de dados */

    $sqlSelect = "SELECT * FROM projetos WHERE id_projeto = $id_projeto";
    $result = $mysqli->query($sqlSelect);

    $row = $result->fetch_assoc();
    $tecAssoc = $row['tecnologia_associada'];
    $statusAtual = $row['status'];

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

                <!-- perfil do utilizador que será editado -->
                <div class="row row-cols-2">
                    <div class="col text-bg-light p-3" id="editarDados2">
                        <h2>Editar Perfil</h2>
                        <form method="post" action="proc_editar_projeto_admin.php">
                            <input type="hidden" name="idProjeto" id="idProjeto" value="<?php echo $id_projeto?>">
                            <label>Tecnologia </label><input type="text" name="novaTec" id="novaTec" value="<?php echo"$tecAssoc"?>"> <br> 
                            <label>Status: </label>
                            <select name="statusNovo" id="statusNovo" value="<?php echo"$statusAtual"?>">
                                <option value="marcado">Marcado</option>
                                <option value="em_progresso">Em Progresso</option>
                                <option value="terminado">Terminado</option>
                            </select><br><br>
                            <input id="salvarAlteracoes" name="salvarAlteracoes" type="submit" value="Salvar Alterações"> <br><br>
                        </form>

                        <a href="pagina_admin.php?id=$user_id">Voltar para o perfil <i class="fa-solid fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>

