<?php

require_once 'db_connect.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM produtos WHERE id =?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $peca = $result->fetch_assoc();
} else {
    die("ID da peça não fornecido");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Peça</title>
    <!-- Fontes e estilos reutilizados da index.php -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Orbitron:wght@500&family=Anton&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../STYLE/style.css">
    <link rel="icon" sizes="192x192" href="/IMG/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="/IMG/1.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/IMG/1.png" type="image/x-icon">
</head>

<body class="bg-light text-dark">
    <header class="bg-dark text-white py-1 shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm title">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style="font-family: 'Audiowide', sans-serif; font-size: 20px;">Riders'
                    Club</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0"
                        style="gap:15px; font-family: 'Audiowide', sans-serif; font-size: 14px;">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Conheça nossa oficina</a></li>
                        <li class="nav-item"><a class="nav-link" href="motosDisponiveis.php">Motos
                                disponíveis</a></li>
                        <li class="nav-item"><a class="nav-link" href="produto.php">Produtos</a></li>
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
                        <button class="btn btn-outline-light btn-sm me-2" data-bs-toggle="modal"
                            data-bs-target="#loginModal">Log
                            in</button>
                        <a class="button-signup btn btn-sm" href="../CLIENT/cadastro.html">Sign Up</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container py-5">
        <?php if ($peca): ?>
            <div class="row">
                <div class="col-md-6">
                    <img src="../ADMIN/uploads/<?= htmlspecialchars($peca['imagem']) ?>" class="img-fluid rounded shadow"
                        alt="<?= htmlspecialchars($peca['nome']) ?>">
                </div>

                <div class="col-md-6">
                    <h1 class="display-5 fw-bold mb-4" style="font-family: 'Audiowide', sans-serif; color: #333;">
                        <?= htmlspecialchars($peca['nome']) ?>
                    </h1>
                    <p class="text-muted fs-5"><strong>A partir de:</strong> R$
                        <?= number_format($peca['preco'], 2, ',', '.') ?>
                    </p>
                    <hr>
                    <h4 class="mt-4" style="font-family: 'Rajdhani', sans-serif; color: #555;">Descrição:</h4>
                    <ul class="list-unstyled mt-3"
                        style="font-family: 'Rajdhani', sans-serif; font-size: 1.1rem; line-height: 1.8; color: #444;">
                        <?php
                        // Divida a descrição em linhas para exibir como lista
                        $descricao = explode("\n", htmlspecialchars($peca['descricao']));
                        foreach ($descricao as $linha):
                            if (!empty(trim($linha))): ?>
                                <li><i class="bi bi-chevron-right text-primary"></i> <?= $linha ?></li>
                            <?php endif;
                        endforeach;
                        ?>
                    </ul>
                    <a href="produto.php" class="btn btn-secondary mt-4">Voltar</a>
                </div>
            </div>
        <?php else: ?>
            <p class="text-danger">Peça não encontrada.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>