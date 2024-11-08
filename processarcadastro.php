<?php
// Conexão com o banco de dados
$servername = "localhost"; // Substitua com o nome do seu servidor de banco de dados
$username = "root";        // Substitua com seu nome de usuário do banco de dados
$password = "";            // Substitua com sua senha do banco de dados
$dbname = "chat_app"; // Substitua com o nome do seu banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificando se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtendo os dados do formulário e sanitizando
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validar se as senhas coincidem
    if ($password !== $confirm_password) {
        echo "As senhas não coincidem.";
        exit();
    }

    // Verificar se o e-mail ou o nome de usuário já existem no banco de dados
    $email_check = "SELECT * FROM usuarios WHERE email = '$email'";
    $username_check = "SELECT * FROM usuarios WHERE username = '$username'";

    $email_result = $conn->query($email_check);
    $username_result = $conn->query($username_check);

    if ($email_result->num_rows > 0) {
        echo "O e-mail já está registrado.";
        exit();
    }

    if ($username_result->num_rows > 0) {
        echo "O nome de usuário já está em uso.";
        exit();
    }

    // Criptografar a senha
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Inserir os dados na tabela 'usuarios'
    $sql = "INSERT INTO usuarios (fullname, email, username, password_hash) 
            VALUES ('$fullname', '$email', '$username', '$password_hash')";

    if ($conn->query($sql) === TRUE) {
        echo "Conta criada com sucesso!";
        // Redirecionar para a página de login
        header("Location: entrar.php");
        exit();
    } else {
        echo "Erro ao criar conta: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>
