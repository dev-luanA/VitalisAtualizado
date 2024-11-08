<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="servicos.css">
  <title>Serviços - Vitalis</title>
</head>
<body>
  <header class="hero-section">
    <nav>
      <img src="img/logo.png" alt="Logo Vitalis" />
      <ul>
        <li><a href="inicio.php">Início</a></li>
        <li><a href="sobrenos.php">Quem somos</a></li>
        <li><a href="servicos.php">Serviços</a></li>
        <li><a href="entretenimento.php">Entretenimento</a></li>
        <li><a href="saudeidoso.php">Saúde</a></li>
        <li><a href="calculoprevidencia.php">Cálculo de Previdência</a></li>
      </ul>
    </nav>
  </header>

  <section class="hero">
    <img src="img/idosotablet.png" alt="Idoso usando tablet">
    <div class="texto-servicos">
      <h2>Serviços</h2>
      <p>Com uma navegação simples, você pode encontrar cuidadores por localização, filtrar pelos serviços oferecidos. Nossa missão é garantir que os idosos recebam o cuidado que merecem, com conforto e dignidade, em qualquer fase da vida.</p>
      <button class="cta-btn"><a href="cadastrocuidador.php">É cuidador? Cadastre-se aqui.</a></button>
    </div>
  </section>

  <!-- Barra de Pesquisa -->
  <div class="search-bar">
    <form method="GET" action="servicos.php">
      <input type="text" name="area" placeholder="Procure por área de trabalho">
      <button type="submit">Pesquisar</button>
    </form>
  </div>

  <!-- Exibição dos Cartões dos Cuidadores -->
  <section class="cards">
    <?php
      // Conectando ao banco de dados
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "chat_app";

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Verifique se o usuário fez uma pesquisa por área
      $area = isset($_GET['area']) ? $_GET['area'] : '';

      // Montar a consulta com ou sem filtro
      if ($area) {
          // Consulta com filtro por área de trabalho
          $sql = "SELECT nome, telefone, endereco, valor, foto, area_trabalho 
                  FROM cuidadores 
                  WHERE area_trabalho LIKE '%$area%'";
      } else {
          // Consulta padrão sem filtro
          $sql = "SELECT nome, telefone, endereco, valor, foto, area_trabalho 
                  FROM cuidadores";
      }

      $result = $conn->query($sql);

      // Exibe os resultados
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '<div class="card">
                      <img src="' . $row["foto"] . '" alt="Cuidador">
                      <div class="card-info">
                        <h3>R$' . $row["valor"] . '/Dia</h3>
                        <p>Área: ' . $row["area_trabalho"] . '</p>
                        <h4>' . $row["nome"] . '</h4>
                        <p>' . $row["telefone"] . '</p>
                      </div>
                    </div>';
          }
      } else {
          echo "<p>Não há cuidadores cadastrados na área especificada.</p>";
      }

      $conn->close();
    ?>
  </section>

  <!-- Rodapé -->
  <footer>
    <div class="container">
      <div class="footer-section">
        <img src="img/logo.png" alt="Logo" class="footer-logo">
        <p>Vitalis é uma plataforma dedicada a melhorar a qualidade de vida da pessoa idosa, oferecendo soluções integradas em saúde, entretenimento e mentoria.</p>
        <a href="facebook.com"><img src="img/facebook.png" alt="Facebook"></a>
        <a href="instagram.com"><img src="img/instagram.png" alt="Instagram"></a>
        <a href="x.com"><img src="img/twitter.png" alt="Twitter"></a>
      </div>
      <div class="footer-section">
        <h3>Links</h3>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="servicos.php">Serviços</a></li>
          <li><a href="servicos.php">Feedback</a></li>
          <li><a href="entrar.php">Entrar</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>Legal</h3>
        <a href="caminho/para/o/termos_de_uso.pdf" target="_blank">Termos de uso</a>
      </div>
    </div>
  </footer>
</body>
</html>
