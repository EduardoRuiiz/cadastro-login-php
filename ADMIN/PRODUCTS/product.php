<?php
require_once '../../SERVER/db_connect.php';
require_once 'products_functions.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'listar';
$produtos = [];

if ($action === 'listar') {
    $produtos = listarProdutos();
} elseif ($action === 'criar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $categoria_id = $_POST['categoria'];

    // Verifica se o arquivo foi enviado
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagemTmp = $_FILES['imagem']['tmp_name']; // Caminho temporário do arquivo
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION); // Obtém a extensão do arquivo
        $imagemNome = uniqid() . '.' . $extensao; // Gera um nome único para o arquivo
        $imagemDestino = "../uploads/" . $imagemNome; // Caminho final do arquivo

        // Move o arquivo para a pasta de uploads
        if (move_uploaded_file($imagemTmp, $imagemDestino)) {
            // Salva o caminho da imagem no banco de dados
            if (criarProduto($nome, $descricao, $preco, $imagemNome, $categoria_id)) {
                header("Location: product.php?action=listar");
                exit;
            } else {
                echo "Erro ao criar o produto.";
            }
        } else {
            echo "Erro ao salvar a imagem.";
        }
    } else {
        echo "Erro no upload da imagem.";
    }
} elseif ($action === 'buscar') {
    $filtro = $_GET['filtro'];
    $query = isset($_GET['query']) ? $_GET['query'] : '';

    if ($filtro === 'todos') {
        $produtos = listarProdutos(); // Exibe todos os produtos
    } elseif ($filtro === 'nome') {
        $produtos = buscarProdutosPorNome($query); // Busca por nome
    } elseif ($filtro === 'categoria') {
        $produtos = buscarProdutosPorCategoria($query); // Busca por categoria
    } elseif ($filtro === 'preco') {
        // Substituir vírgulas por pontos e converter para float
        $preco = (float) str_replace(',', '.', $query);
        $produtos = buscarProdutosPorPreco($preco); // Busca por preço
    } else {
        $produtos = [];
    }

    if (empty($produtos)) {
        echo "<p class='text-center'>Nenhum produto encontrado para a busca.</p>";
    }
} elseif ($action === 'editar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $categoria_id = $_POST['categoria'];

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagemTmp = $_FILES['imagem']['tmp_name'];
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $imagemNome = uniqid() . '.' . $extensao;
        $imagemDestino = "../uploads/" . $imagemNome;

        if (move_uploaded_file($imagemTmp, $imagemDestino)) {
            atualizarProduto($id, $nome, $descricao, $preco, $imagemNome, $categoria_id);
        }
    } else {
        atualizarProduto($id, $nome, $descricao, $preco, null, $categoria_id);
    }
    header("Location: product.php?action=listar");
    exit;
} elseif ($action === 'editar') {
    $id = $_GET['id'];
    $produto = buscarProduto($id); // Função que retorna os dados do produto pelo ID
    if (!$produto) {
        echo "Produto não encontrado.";
        exit;
    }
} elseif ($action === 'deletar') {
    $id = $_GET['id'];
    if (deletarProduto($id)) {
        header("Location: product.php?action=listar");
        exit;
    } else {
        echo "Erro ao deletar o produto.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../STYLE/style.css">
</head>
<div class="d-flex">
    <nav class="sidebar bg-dark text-white p-3">
        <h4 class="text-center">Painel Admin</h4>
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a class="nav-link text-white" href="../dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="product.php">Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../categories/category.php">Categorias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../logout.php">Sair</a>
            </li>
        </ul>
    </nav>

    <main class="flex-grow-1 p-4">
        <h1 class="text-center mb-4">Produtos</h1>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <?php if ($action !== 'criar'): ?>
                    <a href="product.php?action=criar" class="btn btn-primary">Adicionar novo produto</a>
                <?php endif; ?>
            </div>
            <form action="product.php" method="GET" class="d-flex">
                <input type="hidden" name="action" value="buscar">
                <select name="filtro" class="form-select me-2" required>
                    <option value="todos">Todos</option>
                    <option value="nome">Nome</option>
                    <option value="categoria">Categoria</option>
                    <option value="preco">Preço</option> <!-- Novo filtro -->
                </select>
                <input type="text" name="query" class="form-control me-2" placeholder="Digite sua busca..." id="query"
                    required>
                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
            </form>

            <script>
                // Desabilitar o campo de texto quando "Todos" for selecionado
                const filtro = document.querySelector('select[name="filtro"]');
                const query = document.getElementById('query');

                filtro.addEventListener('change', () => {
                    if (filtro.value === 'todos') {
                        query.value = '';
                        query.disabled = true;
                    } else {
                        query.disabled = false;
                    }
                });
            </script>
        </div>
        <?php if ($action === 'criar'): ?>
            <form action="product.php?action=criar" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
                </div>
                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem</label>
                    <input type="file" class="form-control" id="imagem" name="imagem" required>
                </div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select class="form-control" id="categoria" name="categoria" required>
                        <?php
                        $categorias = $connect->query("SELECT * FROM categorias");
                        while ($categoria = $categorias->fetch_assoc()) {
                            echo "<option value='{$categoria['id']}'>{$categoria['nome']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Criar Produto</button>
            </form>
        <?php elseif ($action === 'editar' && isset($produto)): ?>
            <form action="product.php?action=editar&id=<?= $produto['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome"
                        value="<?= htmlspecialchars($produto['nome']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao"
                        required><?= htmlspecialchars($produto['descricao']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="number" step="0.01" class="form-control" id="preco" name="preco"
                        value="<?= htmlspecialchars($produto['preco']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem</label>
                    <input type="file" class="form-control" id="imagem" name="imagem">
                    <small>Imagem atual: <img src="../uploads/<?= htmlspecialchars($produto['imagem']) ?>"
                            alt="<?= htmlspecialchars($produto['nome']) ?>" style="width: 100px; height: auto;"></small>
                </div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select class="form-control" id="categoria" name="categoria" required>
                        <?php
                        $categorias = $connect->query("SELECT * FROM categorias");
                        while ($categoria = $categorias->fetch_assoc()) {
                            $selected = $categoria['id'] == $produto['categoria_id'] ? 'selected' : '';
                            echo "<option value='{$categoria['id']}' $selected>{$categoria['nome']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </form>
        <?php else: ?>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td>
                                <img src="../uploads/<?= htmlspecialchars($produto['imagem']) ?>"
                                    alt="<?= htmlspecialchars($produto['nome']) ?>" style="width: 100px; height: auto;">
                            </td>
                            <td><?= htmlspecialchars($produto['nome']) ?></td>
                            <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                            <td><?= htmlspecialchars($produto['nome_categoria']) ?></td>
                            <td>
                                <a href="product.php?action=editar&id=<?= $produto['id'] ?>"
                                    class="btn btn-warning btn-sm">Editar</a>
                                <a href="product.php?action=deletar&id=<?= $produto['id'] ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Tem certeza que deseja deletar este produto?')">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
</div>

</html>