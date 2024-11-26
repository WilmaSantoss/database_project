<?php 
session_start();


/* conexão com a base de dados */
$user_id = $_SESSION['user_id'];
include('../conexao.php');

/* Pegando os dados atuais do banco de dados */

$sql_dados_atuais = "SELECT * FROM utilizadores WHERE user_id = $user_id";
$result = $mysqli->query($sql_dados_atuais);

$row = $result->fetch_assoc();
$nomeAtual = $row['nome'];
$apelidoAtual = $row['apelido'];

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

                <!-- perfil do utilizador -->
                <div class="row row-cols-2">
                    <div class="col text-bg-light p-3" id="editarDados2">
                        <h2>Editar Perfil</h2>
                        <form method="post" action="proc_editar_dados_uti.php">
                            <label>Novo nome: </label><input type="text" name="novoNome" id="novoNome" value="<?php echo"$nomeAtual"?>"> <br> 
                            <label>Novo Apelido: </label><input type="text" name="novoApelido" id="novoApelido" value="<?php echo"$apelidoAtual"?>"> <br><br>
                            <input id="salvarAlteracoes" name="salvarAlteracoes" type="submit" value="Salvar Alterações"> <br><br>
                        </form>

                        <a href="pagina_utilizador.php?id=$user_id">Voltar para o perfil <i class="fa-solid fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>

