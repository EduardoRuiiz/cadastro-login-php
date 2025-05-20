<?php
session_start();
require_once 'db_connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_username = mysqli_real_escape_string($connect, $_POST["username_client"]);
    $client_password = mysqli_real_escape_string($connect, $_POST["password_client"]);

    $stmt = $connect->prepare("SELECT * FROM clientes WHERE client_username = ?");
    $stmt->bind_param("s", $client_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($cliente = $result->fetch_assoc()) {
        if (password_verify($client_password, $cliente['client_password'])) {
            $_SESSION['cliente_id'] = $cliente['id'];
            exit;
        } else {
            $erro = 'Usuário ou senha inválidos.';
        }
    }
}

?>