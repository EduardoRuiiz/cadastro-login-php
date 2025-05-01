<?php
$login_cookie = $_COOKIE["login"] ?? null;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pagina inicial</title>
</head>

<body class="bg-primary">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow p-4">
                    <h2 class="text-center mb-4">
                        <?php if (isset($login_cookie)): ?>
                            Bem-vindo, <span
                                class="text-primary"><?= htmlspecialchars($login_cookie, ENT_QUOTES, 'UTF-8') ?></span>!
                        <?php else: ?>
                            Bem-vindo, Convidado</span>!
                        <?php endif; ?>
                    </h2>

                    <div class="text-center">
                        <?php if (isset($login_cookie)): ?>
                            <p class="text-success">Essas informações <strong>PODEM</strong> ser acessadas por você.</p>
                        <?php else: ?>
                            <p class="text-danger">Essas informações <strong>NÃO PODEM</strong> ser acessadas por você.</p>
                            <a href="/cadastro-login-php-main/CLIENT/login.html" class="btn btn-primary mt-3">Fazer Login</a>
                            <p></p>
                            <h2>Nao possui uma conta?</h2>
                            <a href="/cadastro-login-php-main/CLIENT/cadastro.html" class="btn btn-primary mt-3">Cadastrar-se</a>
                        <?php endif; ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</body>

</html>