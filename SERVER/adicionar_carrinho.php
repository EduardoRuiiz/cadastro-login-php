<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto_id = intval($_POST['produto_id']);
    $quantidade = intval($_POST['quantidade']);

    if ($produto_id > 0 && $quantidade > 0) {
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        if (isset($_SESSION['carrinho'][$produto_id])) {
            $_SESSION['carrinho'][$produto_id] += $quantidade;
        } else {
            $_SESSION['carrinho'][$produto_id] = $quantidade;
        }
    }
}

header('Location: carrinho.php');
exit;