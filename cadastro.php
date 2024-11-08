<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="cadastro.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- Font Awesome -->
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="left-section">
                <h1>BEM VINDO</h1>
                <img src="img/logo.png" alt="Logo" class="logo">
                <p>Já tem uma conta?</p>
                <button class="create-account-btn" onclick="window.location.href='entrar.php'">FAÇA LOGIN</button>
            </div>
            <div class="right-section">
                <h1>CRIAR CONTA</h1>
                <form action="processarcadastro.php" method="POST">
                    <div class="input-group">
                        <label for="fullname"><i class="fa fa-user"></i></label>
                        <input type="text" id="fullname" name="fullname" placeholder="Nome Completo" required>
                    </div>
                    <div class="input-group">
                        <label for="email"><i class="fa fa-envelope"></i></label>
                        <input type="email" id="email" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="input-group">
                        <label for="username"><i class="fa fa-user"></i></label>
                        <input type="text" id="username" name="username" placeholder="Nome de usuário" required>
                    </div>
                    <div class="input-group">
                        <label for="password"><i class="fa fa-lock"></i></label>
                        <input type="password" id="password" name="password" placeholder="Senha" required>
                        <span id="togglePassword" class="toggle-password">
                            <i class="far fa-eye"></i>
                        </span>
                    </div>
                    <div class="input-group">
                        <label for="confirm_password"><i class="fa fa-lock"></i></label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmar Senha" required>
                        <span id="toggleConfirmPassword" class="toggle-password">
                            <i class="far fa-eye"></i>
                        </span>
                    </div>
                    <button type="submit" class="login-btn">Criar Conta</button>
                </form>
            </div>
        </div>
    </div>

    <script src="cadastro.js"></script> <!-- Arquivo JS para funcionalidade extra -->
</body>
</html>
