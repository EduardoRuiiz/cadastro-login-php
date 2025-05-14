<?php

require_once '../SERVER/db_connect.php';
require "verify_log.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../STYLE/style.css">
</head>
<div class="d-flex">
    <nav class="sidebar bg-dark text-white p-3">
        <h4 class="text-center">Painel Admin</h4>
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="products/product.php">Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="categories/category.php">Categorias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="logout.php">Sair</a>
            </li>
        </ul>
    </nav>

    <main class="flex-grow-1 p-4">
        <h1>Bem-vindo!</h1>
        <p>Conteúdo principal aqui.</p>
    </main>
</div>

</html>