<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $stmt = $connect->prepare("INSERT INTO usuarios (login, senha) VALUES (?, ?)");
    $stmt->bind_param("ss", $login, $senha);

    if ($stmt->execute()) {
        header("Location: ../CLIENT/cadastrado.html");
        exit();
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }

    $stmt->close();
}

$connect->close();
?>