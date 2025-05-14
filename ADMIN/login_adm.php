<?php
session_start();
require_once '../SERVER/db_connect.php';

$erro = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $senha = mysqli_real_escape_string($connect, $_POST["senha"]);

    $stmt = $connect->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($admin = $result->fetch_assoc()) {
        if (password_verify($senha, $admin['senha'])) {
            $_SESSION['admin_id'] = $admin['id'];
            header('Location: dashboard.php');
            exit;
        } else {
            $erro = 'Usuário ou senha inválidos.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuario</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Orbitron:wght@500&family=Anton&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../STYLE/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
</head>

<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="w-100 text-decoration-none">
            <div class="container text-center">
                <span class="navbar-brand mb-0 h1 text-white">Tela inicial</span>
            </div>
        </a>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <h2 class="text-center mb-4 h2-login">Login</h2>
                    <?php if ($erro): ?>
                        <div class="alert alert-danger text-center"><?= $erro ?></div>
                    <?php endif; ?>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Seu Username" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Sua Senha"
                                required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="signup-button">Entrar</button>
                        </div>
                    </form>
                    <div class="mb-3">
                        <label for="username" class="form-label signup-label">Não possui uma conta?</label>
                    </div>
                    <div>
                        <a href="../ADMCLIENT/signup_adm.html" class="signup-button"
                            style="text-decoration: none">Cadastre-se</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>