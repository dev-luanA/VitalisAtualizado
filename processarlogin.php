<?php
// Conexão com o banco de dados
$servername = "localhost"; // Substitua com o nome do seu servidor de banco de dados
$username = "root";        // Substitua com seu nome de usuário do banco de dados
$password = "";            // Substitua com sua senha do banco de dados
$dbname = "chat_app";      // Nome do banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificando se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtendo os dados do formulário e sanitizando
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Verificar se o e-mail existe no banco de dados
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // O usuário foi encontrado, verificar a senha
        $user = $result->fetch_assoc();

        // Verificar se a senha fornecida é válida
        if (password_verify($password, $user['password_hash'])) {
            // Login bem-sucedido, iniciar sessão e redirecionar para o painel ou página inicial
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];

            // Redirecionar para o painel ou página inicial
            header("Location: inicio.php");
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "E-mail não encontrado.";
    }
}

// Fechar a conexão
$conn->close();
?>
