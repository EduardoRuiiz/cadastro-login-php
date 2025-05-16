
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
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
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
                <li><a class="dropdown-item" href="#">Deslogar</a></li>
              </ul>
            </li>
          </ul>

          <div class="d-flex" style="gap:8px; font-family: 'Audiowide', sans-serif; font-size: 13px;">
            <button class="btn btn-outline-light btn-sm me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Log
              in</button>
            <a class="button-signup btn btn-sm" href="CLIENT/cadastro.html">Sign Up</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Log in</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Log in</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Adicione os scripts do Bootstrap e Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
