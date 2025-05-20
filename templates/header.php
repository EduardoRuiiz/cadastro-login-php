<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $client_username = mysqli_real_escape_string($connect, $_POST["username_client"]);
  $client_password = mysqli_real_escape_string($connect, $_POST["password_client"]);

  $stmt = $connect->prepare("SELECT * FROM clientes WHERE client_username = ?");
  $stmt->bind_param("s", $client_username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($cliente = $result->fetch_assoc()) {
    if (password_verify($client_password, $cliente['client_password'])) {
      $_SESSION['cliente_id'] = $cliente['id'];
      header("Location: " . $_SERVER['REQUEST_URI']);
      exit;
    } else {
      $erro = 'Usuário ou senha inválidos.';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Orbitron:wght@500&family=Anton&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" sizes="192x192" href="/IMG/1.png" type="image/x-icon">
  <link rel="shortcut icon" href="/IMG/1.png" type="image/x-icon">
  <link rel="apple-touch-icon" href="/IMG/1.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/STYLE/style.css">

  <meta name="description" content="O melhor lugar para você adquirir, customizar e aprimorar sua moto.">
  <meta name="author" content="Riders' Club">
  <title>Riders' Club</title>

  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


</head>

<body class="bg-light text-dark">

  <header class="bg-dark text-white py-1 shadow-sm">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm title">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" style="font-family: 'Audiowide', sans-serif; font-size: 20px;">Riders' Club</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0"
            style="gap:15px; font-family: 'Audiowide', sans-serif; font-size: 14px;">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="/index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Conheça nossa oficina</a></li>
            <li class="nav-item"><a class="nav-link" href="/server/motosDisponiveis.php">Motos disponíveis</a></li>
            <li class="nav-item"><a class="nav-link" href="/server/produto.php">Produtos</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Serviços de manutenção</a></li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                Opções
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="../SERVER/client_logout.php">Deslogar</a></li>
              </ul>
            </li>
          </ul>

          <?php if (isset($_SESSION['cliente_id'])): ?>
            <!-- Usuário logado: mostrar botão do carrinho -->
            <div class="d-flex" style="gap:8px; font-family: 'Audiowide', sans-serif; font-size: 13px;">
              <a href="/server/carrinho.php" class="btn btn-outline-light btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart"
                  viewBox="0 0 16 16">
                  <path
                    d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .485.379L2.89 5H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 14H4a.5.5 0 0 1-.491-.408L1.01 2H.5a.5.5 0 0 1-.5-.5zm3.14 4l1.25 6.5h7.22l1.25-6.5H3.14zM5.5 16a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm7 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg>
                Carrinho
              </a>
            </div>
          <?php else: ?>
            <!-- Usuário não logado: mostrar login e sign up -->
            <div class="d-flex" style="gap:8px; font-family: 'Audiowide', sans-serif; font-size: 13px;">
              <button class="btn btn-outline-light btn-sm me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Log
                in</button>
              <a class="button-signup btn btn-sm" href="/server/cadastro.php">Sign Up</a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  </header>
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark text-white border-danger" style="border-width:2px;">
        <div class="modal-header border-bottom border-danger">
          <h5 class="modal-title" id="loginModalLabel" style="font-family: 'Audiowide', sans-serif">Log in</h5>
          <button type=" button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="username" name="username_client" class="form-control bg-dark text-white border-danger"
                id="client_username" placeholder="example@1123" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password_client" class="form-control bg-dark text-white border-danger"
                id="password" placeholder="Password" required>
            </div>
            <button type="submit" style="font-family: 'Audiowide', sans-serif" class="signup-button">Entrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>