<?php
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar e Botões</title>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-start align-items-start">
                <span class="text-white">Bem-vindo ao Rider's Club</span>
            </div>
        </div>
    </header>

    <div class="container-fluid content d-flex justify-content-center align-items-center min-vh-100">
        <div class="row w-100">
            <div class="row flex-lg-row-reverse align-items-top g-5 py-5 mb-5">
                <!-- Coluna para a imagem -->
                <div class="col-12 col-sm-8 col-lg-6">
                    <img src="../IMG/1.png" class="d-block mx-lg-auto img-fluid" alt="Imagem Moto" width="300"
                        height="300" loading="lazy">
                </div>

                <!-- Coluna para o texto -->
                <div class="col-12 col-sm-8 col-lg-6 ms-auto mb-5">
                    <h1 class="display-4 fw-bold text-body-emphasis lh-1 mb-3">Vem de moto, Vem de Rider's Club!</h1>
                    <p class="lead">Atendimento rápido e responsável! O melhor lugar para você adquirir, customizar e
                        aprimorar sua moto. Venha conhecer nossos produtos e serviços.</p>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Serviços disponíveis</button>
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Contato</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="b-example-divider"></div>

    <div class="container-fluid content d-flex justify-content-center align-items-center min-vh-100">
        <div class="row w-100">
            <!-- Primeira coluna de botões -->
            <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                <button class="btn btn-outline-secondary w-75 mb-5" type="submit">Troca de óleo +</button>
                <button class="btn btn-outline-secondary w-75 mb-5" type="submit">Revisão +</button>
                <button class="btn btn-outline-secondary w-75" type="submit">Pneus +</button>
            </div>

            <!-- Imagem central -->
            <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                <img src="../IMG/1.png" alt="Ícone" width="300" height="300" class="me-2">
            </div>

            <!-- Segunda coluna de botões -->
            <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                <button class="btn btn-outline-secondary w-75 mb-5" type="submit">Alinhamento +</button>
                <button class="btn btn-outline-secondary w-75 mb-5" type="submit">Lavagem Completa +</button>
                <button class="btn btn-outline-secondary w-75" type="submit">Pintura +</button>
            </div>
        </div>
    </div>

    <footer class="footer bg-dark text-white text-center py-3">
        <p class="mb-0">2025 Riders'Club - Todos os direitos reservados</p>
    </footer>
</body>

</html>