<?php
// Conectando ao banco de dados
$servername = "localhost";
$username = "root"; // Substitua com o seu usuário do banco
$password = ""; // Substitua com a sua senha do banco
$dbname = "chat_app"; // O nome do seu banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $valor = $_POST['valor'];
    $area_trabalho = $_POST['area_trabalho'];
    
    // Tratar a foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto'];
        $foto_nome = $foto['name'];
        $foto_tmp = $foto['tmp_name'];
        $foto_destino = 'uploads/' . $foto_nome;

        // Verifica se a pasta "uploads" existe, caso contrário, cria
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        // Move a foto para o diretório "uploads"
        move_uploaded_file($foto_tmp, $foto_destino);
    }

    // Inserir dados no banco
    $sql = "INSERT INTO cuidadores (nome, telefone, endereco, valor, area_trabalho, foto) VALUES ('$nome', '$telefone', '$endereco', '$valor', '$area_trabalho', '$foto_destino')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
        header('Location: servicos.php'); // Redireciona para a página de serviços após o cadastro
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cuidadores</title>
    <link rel="stylesheet" href="cadastrocuidador.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="left-section">
                <img src="vitalis2.png" alt="Logo da Vitalis" class="logo">
                <h1>Ofereça seus serviços</h1>
                <p>Preencha o formulário ao lado para se cadastrar como cuidador de idosos.</p>
            </div>
            <div class="right-section">
                <h1>Criar conta</h1>
                <!-- Formulário de cadastro sem login -->
                <form action="cadastrocuidador.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group">
                        <label for="nome">Nome Completo</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>
                    <div class="input-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" id="telefone" name="telefone" required>
                    </div>
                    <div class="input-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" id="endereco" name="endereco" required>
                    </div>
                    <div class="input-group">
                        <label for="valor">Valor</label>
                        <input type="text" id="valor" name="valor" required>
                    </div>
                    <!-- Campo de seleção para área de trabalho -->
                    <div class="input-group">
                        <label for="area_trabalho">Área de Trabalho</label>
                        <select id="area_trabalho" name="area_trabalho" required>
                            <option value="Cuidador">Cuidador</option>
                            <option value="Asilo">Asilo</option>
                            <option value="Residência">Residência</option>
                            <option value="Hospital">Hospital</option>
                            <option value="Casa de Repouso">Casa de Repouso</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                    <!-- Campo para upload de foto -->
                    <div class="input-group">
                        <label for="foto">Foto do Cuidador</label>
                        <input type="file" id="foto" name="foto" accept="image/*" required>
                    </div>
                    <button type="submit" class="create-account-btn">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Exemplo para exibir a foto carregada -->
    <?php if (isset($foto_destino)): ?>
        <div class="foto-exibicao">
            <h2>Foto do Cuidador:</h2>
            <img src="<?php echo $foto_destino; ?>" alt="Foto do Cuidador" width="200">
        </div>
    <?php endif; ?>

</body>
</html>
