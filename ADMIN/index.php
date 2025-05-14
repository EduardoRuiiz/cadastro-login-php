<?php

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Página Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }

        .admin-box {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .admin-box h1 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .btn-login {
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="admin-box">
        <h1>Área Administrativa</h1>
        <p class="text-center mb-4 text-muted">Escolha uma opção para continuar:</p>
        <div class="d-grid gap-3">
            <a href="login_adm.php" class="btn btn-primary btn-login">Login</a>
            <a href="signup_adm.php" class="btn btn-primary btn-login">Cadastrar novo admin</a>
        </div>
    </div>
</body>

</html>