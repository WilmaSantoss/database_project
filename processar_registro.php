
<?php
    /* conexão ao banco de dados */
    include('conexao.php');

    /* verificação de o email já existe */
    $email = $_POST['email'];
    $email = mysqli_real_escape_string($mysqli, $email);
    $sql = "SELECT email FROM caso_pratico_php.utilizadores WHERE email='$email'";
    $retorno = mysqli_query($mysqli, $sql);

    /* inclusão dos dados na base de dados */
    if (mysqli_num_rows($retorno) > 0) {
        echo 'EMAIL já cadastrado!<br>';
    } else {
        $nome = $_POST['nome'];
        $apelido = $_POST['apelido'];
        $email = $_POST['email'];
        $password = $_POST['password']; 

        /* adicionando o md5 */
        $password_md5 = md5($password);

        $sql = "INSERT INTO caso_pratico_php.utilizadores (nome, apelido, email, password, user_type) VALUES('$nome', '$apelido', '$email', '$password_md5', 'utilizador')";
        $resultado = mysqli_query($mysqli, $sql);
        if ($resultado) {
            echo ">>>> Usuario cadastrado com sucesso <br> <br>";
            echo "<a href='index.html'>VOLTAR</a>";
        } else {
            echo "Erro ao cadastrar usuário. Por favor, tente novamente.<br>";
        }
    }
?>



<!-- 
    /* conexão ao banco de dados */
    include('conexao.php');

    /* verificação de o email já existe */
    $email = $_POST['email'];
    $email = mysqli_real_escape_string($mysqli, $email);
    $sql = "SELECT email FROM caso_pratico_php.utilizadores WHERE email='$email'";
    $retorno = mysqli_query($mysqli, $sql);

    /* inclusão dos dados na base de dados */
    if (mysqli_num_rows($retorno) > 0) {
        echo 'EMAIL já cadastrado!<br>';
    } else {
        $nome = $_POST['nome'];
        $apelido = $_POST['apelido'];
        $email = $_POST['email'];
        $password = $_POST['password']; 

        /* adicionando o md5 */

        $password_md5 = md5($password);
        
        $sql = "INSERT INTO caso_pratico_php.utilizadores (nome, apelido, email, password, user_type) VALUES('$nome', '$apelido', '$email', '$password_md5', 'utilizador')";
        $resultado = mysqli_query($mysqli, $sql);
        if ($resultado) {
            echo ">>>> Usuario cadastrado com sucesso <br> <br>";
            echo "<a href='index.html'>VOLTAR</a>";
        } else {
            echo "Erro ao cadastrar usuário. Por favor, tente novamente.<br>";
        }
    }
 -->