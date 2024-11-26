<?php 
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $_POST['password'];

    // Criptografar a senha com MD5
    $senha_md5 = md5($senha);

    $sql_code = "SELECT user_id, user_type, password FROM utilizadores WHERE email= '$email'";
    $resultado = $mysqli->query($sql_code);

    if (!$resultado) {
        die("Erro na consulta SQL: " . $mysqli->error);
    }

    if ($resultado->num_rows == 1) {
        $row = $resultado->fetch_assoc();

        // Debug: Imprimir senhas para verificação
        echo "Senha digitada (MD5): $senha_md5<br>";
        echo "Senha armazenada: " . $row['password'] . "<br>";

        // Comparar a senha criptografada MD5 do banco de dados com a senha enviada
        if ($row['password'] === $senha_md5) {
            $_SESSION['user_id'] = $row['user_id'];

            if ($row['user_type'] === 'utilizador') {
                header("Location: pages/pagina_utilizador.php");
            } else if ($row['user_type'] === 'administrador' && $email === 'janedoe@admin.com' AND $senha === '12345') {
                header("Location: pages/pagina_admin.php");
            }
            exit();
        } else {
            echo "Nome de usuário ou senha incorretos.<br><br>";
            echo "<a href='index.html'>VOLTAR</a>";
        }
    } else {
        echo "Nome de usuário ou senha incorretos.<br><br>";
        echo "<a href='index.html'>VOLTAR</a>";
    }
}
?>





<!-- 
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $_POST['password']; // A senha ainda não está criptografada com MD5

    // Criptografar a senha com MD5
    $senha_md5 = md5($senha);

    $sql_code = "SELECT user_id, user_type, password FROM utilizadores WHERE email= '$email'";
    $resultado = $mysqli->query($sql_code);

    if (!$resultado) {
        die("Erro na consulta SQL: " . $mysqli->error);
    }

    if ($resultado->num_rows == 1) {
        $row = $resultado->fetch_assoc();

        // Comparar a senha criptografada MD5 do banco de dados com a senha enviada
        if ($row['password'] === $senha_md5) {
            $_SESSION['user_id'] = $row['user_id'];

            if ($row['user_type'] === 'utilizador') {
                header("Location: pages/pagina_utilizador.php");
            } else if ($row['user_type'] === 'administrador' && $email === 'janedoe@admin.com' AND $senha === '12345') {
                header("Location: pages/pagina_admin.php");
            }
            exit();
        } else {
            echo "Nome de usuário ou senha incorretos.<br><br>";
            echo "<a href='index.html'>VOLTAR</a>";
        }
    } else {
        echo "Nome de usuário ou senha incorretos.<br><br>";
        echo "<a href='index.html'>VOLTAR</a>";
    }
}
 -->



<!-- 
session_start();

include('conexao.php');

/* verificar se ja existe email cadastrado */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* dados do formulario  */
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['password']);

    $sql_code = "SELECT user_id, user_type FROM utilizadores WHERE email= '$email' AND password= '$senha'";
    $resultado = $mysqli->query($sql_code);

    if(!$resultado){
        die("Erro na consulta SQL: " .$mysqli->error);
    }

    if($resultado->num_rows == 1){
        $row = $resultado->fetch_assoc();
        $_SESSION['user_id'] = $row['user_id'];

        if($row['user_type'] === 'utilizador'){
            header("Location: pages/pagina_utilizador.php");
        }else if ($row['user_type'] === 'administrador' && $email === 'janedoe@admin.com' && $senha === '12345'){
            header("Location: pages/pagina_admin.php");
        }
        exit();
    }else{
        echo "Nome de usuário ou senha incorretos.<br><br>";
        echo "<a href='index.html'>VOLTAR</a>";
    }
} 

 -->
