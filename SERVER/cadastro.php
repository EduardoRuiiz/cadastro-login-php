<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Preparar e executar a inserção
    $stmt = $connect->prepare("INSERT INTO usuarios (login, senha) VALUES (?, ?)");
    $stmt->bind_param("ss", $login, $senha);

    if ($stmt->execute()) {
        // Redirecionar para a página cadastrado.html
        header("Location: ../CLIENT/cadastrado.html");
        exit(); // Garante que o script pare aqui
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }

    $stmt->close();
}

$connect->close();
?>