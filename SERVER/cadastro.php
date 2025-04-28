<?php
require_once 'db_connect.php';
require_once '../CLIENT/cadastrado.html';

$arquivo = '../CLIENT/cadastrado.html';
$html = file_get_contents($arquivo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Preparar e executar a inserção
    $stmt = $connect->prepare("INSERT INTO usuarios (login, senha) VALUES (?, ?)");
    $stmt->bind_param("ss", $login, $senha);

    if ($stmt->execute()) {
        return $html;
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }

    $stmt->close();
}

$connect->close();
?>