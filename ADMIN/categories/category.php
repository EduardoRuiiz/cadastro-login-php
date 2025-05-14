<?php

require_once '../../SERVER/db_connect.php';
require_once 'categories_functions.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'])) {
    $nome = trim($_POST['nome']);
    if (!empty($nome)) {
        criarCategoria($nome);
        header("Location: category.php");
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['nome_editar'])) {
    $id = $_POST['id'];
    $nome = trim($_POST['nome_editar']);
    if (!empty($nome)) {
        atualizarCategoria($id, $nome);
        header("Location: category.php");
        exit;
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    deletarCategoria($id);
    header("Location: category.php");
    exit;
}

$categoriaParaEditar = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $categoriaParaEditar = buscarCategoria($id);
}

$categorias = listarCategorias();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../STYLE/style.css">
</head>

<body>
    <div class="d-flex">
        <nav class="sidebar bg-dark text-white p-3">
            <h4 class="text-center">Painel Admin</h4>
            <ul class="nav flex-column mt-4">
                <li class="nav-item"><a class="nav-link text-white" href="../dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="../products/product.php">Produtos</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="category.php">Categorias</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="../logout.php">Sair</a></li>
            </ul>
        </nav>

        <main class="flex-grow-1 p-4">
            <h2 class="mb-4">Categorias</h2>

            <?php if ($categoriaParaEditar): ?>
                <!-- Formulário para editar categoria -->
                <form method="POST" class="mb-4">
                    <input type="hidden" name="id" value="<?= $categoriaParaEditar['id'] ?>">
                    <div class="input-group w-50">
                        <input type="text" name="nome_editar" class="form-control"
                            value="<?= htmlspecialchars($categoriaParaEditar['nome']) ?>" required>
                        <button class="btn btn-primary" type="submit">Atualizar</button>
                    </div>
                </form>
            <?php else: ?>
                <!-- Formulário para adicionar nova categoria -->
                <form method="POST" class="mb-4">
                    <div class="input-group w-50">
                        <input type="text" name="nome" class="form-control" placeholder="Nova categoria" required>
                        <button class="btn btn-primary" type="submit">Adicionar</button>
                    </div>
                </form>
            <?php endif; ?>

            <table class="table table-bordered table-striped w-75">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categorias as $categoria): ?>
                        <tr>
                            <td><?= $categoria['id'] ?></td>
                            <td><?= htmlspecialchars($categoria['nome']) ?></td>
                            <td>
                                <a href="category.php?id=<?= $categoria['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="category.php?delete=<?= $categoria['id'] ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Deseja excluir esta categoria?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>