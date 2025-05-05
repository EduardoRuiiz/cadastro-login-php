<?php
$login_cookie = $_COOKIE["login"] ?? null;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Orbitron:wght@500&family=Anton&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap" rel="stylesheet">

    <title>Riders' Club</title>

    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="icon" sizes="192x192" href="/IMG/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="/IMG/1.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/IMG/1.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/STYLE/style.css">

    <meta name="description" content="O melhor lugar para você adquirir, customizar e aprimorar sua moto.">
    <meta name="author" content="Riders' Club">
</head>

<body class="bg-light text-dark">

    <header class="bg-dark text-white py-1 shadow-sm">
        <nav class="navbar navbar-dark bg-dark d-flex align-items-center title">
            <div class="d-flex align-items-center">
                <img src="/IMG/logo.png" width="70" height="50" class="d-inline-block align-top me-2"
                    alt="Logo do Rider's Club">
                <span class="navbar-brand mb-0 h1">Rider's Club</span>
            </div>
            <?php if ($login_cookie): ?>
                <div class="ms-auto">
                    <span class="me-3">Bem-vindo, <?= htmlspecialchars($login_cookie) ?>!</span>
                    <a href="?logout=1" class="btn btn-sm btn-outline-light">Sair</a>
                </div>
            <?php else: ?>
                <div class="ms-auto d-flex align-items-center">
                    <span class="me-auto title">Você está navegando como visitante</span>
                    <a href="/CLIENT/login.html" class="btn btn-outline-dark mb-1 button-enter">Entrar</a>
                </div>
            <?php endif; ?>
        </nav>
    </header>

    <section class="hero-bg">

        <div class=" container text-center">
            <h1 class="hero-title">Vem de moto, Vem de Rider's Club!</h1>
            <p class="hero-subtitle">Atendimento rápido e responsável! O melhor lugar para você adquirir, customizar e
                aprimorar
                sua moto.</p>
        </div>
    </section>

    <?php if ($login_cookie): ?>
        <a href="#" class="btn btn-primary btn-lg me-2">Área do Cliente</a>
        <button type="button" class="btn btn-dark button-services">Dark</button>
    <?php else: ?>
        <div class="services-banner1">
            Serviços Disponíveis
        </div>
    <?php endif; ?>
    </section>


    <section class="hero-bg2">
        <div class="row justify-content-center text-center w-100">
            <div class="col-md-3 mb-4">
                <button class="btn btn-outline-dark w-100 py-3 shadow-sm mb-3 services-banner2 grid-item">Troca de óleo
                    +</button><br>
                <button class="btn btn-outline-dark w-100 py-3 shadow-sm mb-3 services-banner2 grid-item">Revisão
                    +</button><br>
                <button class="btn btn-outline-dark w-100 py-3 shadow-sm services-banner2 grid-item">Pneus +</button>
            </div>
            <div class="col-md-4 mb-4 d-flex justify-content-center align-items-center">
            </div>
            <div class="col-md-3 mb-4">
                <button class="btn btn-outline-dark w-100 py-3 shadow-sm mb-3 services-banner2 grid-item">Alinhamento
                    +</button><br>
                <button class="btn btn-outline-dark w-100 py-3 shadow-sm mb-3 services-banner2 grid-item">Lavagem
                    Completa
                    +</button><br>
                <button class="btn btn-outline-dark w-100 py-3 shadow-sm services-banner2 grid-item">Pintura +</button>
            </div>

    </section>

    <div>
    </div>
    <div class="services-banner2">
        Clientes
    </div>
    <footer class="bg-dark text-white text-center py-4 mt-5 shadow-sm">
        <p class="mb-0">&copy; 2025 Riders' Club - Todos os direitos reservados</p>
    </footer>

</body>

</html>