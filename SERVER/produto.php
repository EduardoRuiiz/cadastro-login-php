<?php

require_once 'db_connect.php';
$query = "SELECT * FROM produtos WHERE categoria_id = (SELECT id FROM categorias WHERE nome = 'Peças')";
$result = $connect->query($query);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar e Botões</title>
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

  <style>
    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }
  </style>
</head>

<body>
  <header class="bg-dark text-white py-1 shadow-sm">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm title">
      <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-center title">
          <a class="navbar-brand" href="#"
            style="font-family: 'Audiowide', sans-serif; font-size: 24px;">Riders'Club</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>

          <a class="" href="#" style="margin: 0 10px;"></a>

          <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <!-- Navegação à esquerda -->
            <ul class="navbar-nav mb-2 mb-lg-0" style="gap:25px; font-family: 'Audiowide', sans-serif;">
              <li class="nav-item"><a class="nav-link active" aria-current="page" href="../index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Conheça nossa oficina</a></li>
              <li class="nav-item"><a class="nav-link" href="motosDisponiveis.php">Motos disponíveis</a></li>
              <li class="nav-item"><a class="nav-link" href="produto.php">Produtos</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Serviços de manutenção</a></li>

              <!-- Dropdown de opções -->
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

            <a class="" href="#" style="margin: 0 10px;"></a>

            <!-- Botões alinhados à direita -->
            <div class="d-flex" style="gap:10px; font-family: 'Audiowide', sans-serif; font-size: 15px;">
              <button class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Log
                in</button>
              <a class="button-signup" href="../CLIENT/cadastro.html">Sign Up</a>
            </div>
          </div>
        </div>
    </nav>
  </header>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="display-4 fw-bold text-body-emphasis lh-1 mb-3">Aqui você encontra os melhores produtos do mercado!
        </h1>
        <p class="lead text-muted">Os melhores produtos do merdado com as melhores ofertas.</p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php while ($peca = $result->fetch_assoc()): ?>
          <div class="col">
            <div class="card shadow-sm">
              <img src="../ADMIN/uploads/<?= htmlspecialchars($peca['imagem']) ?>" class="bd-placeholder-img card-img-top"
                width="100%" height="400" alt="<?= htmlspecialchars($peca['nome']) ?>">
              <div class="card-body">
                <p class="card-text"><?= htmlspecialchars($peca['nome']) ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                      <a href="parts_details.php?id=<?= $peca['id'] ?>"
                        class="text-decoration-none text-dark">Visualizar</a>
                    </button>
                  </div>
                  <strong class="text-body-secondary">A partir de: R$
                    <?= number_format($peca['preco'], 2, ',', '.') ?></strong>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>