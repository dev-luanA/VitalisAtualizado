<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="entrar.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- Font Awesome -->
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="left-section">
                <h1>BEM VINDO</h1>
                <img src="img/logo.png" alt="Logo" class="logo">
                <p>Não tem uma conta?</p>
                <button class="create-account-btn" onclick="window.location.href='cadastro.php'">CRIAR CONTA</button>
            </div>
            <div class="right-section">
                <h1>FAÇA LOGIN</h1>
                <form action="processarlogin.php" method="POST">
                    <div class="input-group">
                        <label for="email"><i class="fa fa-envelope"></i></label>
                        <input type="email" id="email" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="input-group">
                        <label for="password"><i class="fa fa-lock"></i></label>
                        <input type="password" id="password" name="password" placeholder="Senha" required>
                        <span id="togglePassword" class="toggle-password">
                            <i class="far fa-eye"></i> <!-- Ícone de olho -->
                        </span>
                    </div>
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Lembrar de mim</label>
                    </div>
                    <button type="submit" class="login-btn">Entrar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="entrar.js"></script> <!-- Arquivo JS -->
</body>
</html>
