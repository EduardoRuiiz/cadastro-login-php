<?php

require_once '../../SERVER/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $stmt = $connect->prepare("INSERT INTO admins (username, senha, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $senha, $email);

    if ($stmt->execute()) {
        header("Location: adm_cadastrado.php");
        exit();
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }

    $stmt->close();
}

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> Cadastro </title>
    <link rel="stylesheet" href="../../STYLE/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Orbitron:wght@500&family=Anton&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../STYLE/style.css">
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
                    <h2 class="text-center mb-4 h2-login">Tela de Cadastro</h2>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="username" class="form-label signup-label">Criar Username</label>
                            <input type="text" class="form-control" name="username" id="username" required
                                placeholder="Digite um username">
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label signup-label">Criar senha</label>
                            <input type="password" class="form-control" name="senha" id="senha" required
                                placeholder="Digite uma senha">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label signup-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required
                                placeholder="Digite seu email">
                        </div>
                        <div class="d-grid">
                            <button type="submit" value="Cadastrar" id="cadastrar" name="cadastrar"
                                class="signup-button">Cadastrar</button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label signup-label">Ja possui uma conta?</label>
                        </div>
                        <div>
                            <a href="login_adm.php" class="signup-button" style="text-decoration: none">Fazer
                                Login</a>
                        </div>
                    </form>
</body>

</html>