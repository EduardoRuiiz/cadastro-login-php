<?php

require_once 'db_connect.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM produtos WHERE id =?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $peca = $result->fetch_assoc();
} else {
    die("ID da peça não fornecido");
}
?>
<?php include_once "../templates/header.php" ?>


    <div class="container py-5">
        <?php if ($peca): ?>
            <div class="row">
                <div class="col-md-6">
                    <img src="../ADMIN/uploads/<?= htmlspecialchars($peca['imagem']) ?>" class="img-fluid rounded shadow"
                        alt="<?= htmlspecialchars($peca['nome']) ?>">
                </div>

                <div class="col-md-6">
                    <h1 class="display-5 fw-bold mb-4" style="font-family: 'Audiowide', sans-serif; color: #333;">
                        <?= htmlspecialchars($peca['nome']) ?>
                    </h1>
                    <p class="text-muted fs-5"><strong>A partir de:</strong> R$
                        <?= number_format($peca['preco'], 2, ',', '.') ?>
                    </p>
                    <hr>
                    <h4 class="mt-4" style="font-family: 'Rajdhani', sans-serif; color: #555;">Descrição:</h4>
                    <ul class="list-unstyled mt-3"
                        style="font-family: 'Rajdhani', sans-serif; font-size: 1.1rem; line-height: 1.8; color: #444;">
                        <?php
                        // Divida a descrição em linhas para exibir como lista
                        $descricao = explode("\n", htmlspecialchars($peca['descricao']));
                        foreach ($descricao as $linha):
                            if (!empty(trim($linha))): ?>
                                <li><i class="bi bi-chevron-right text-primary"></i> <?= $linha ?></li>
                            <?php endif;
                        endforeach;
                        ?>
                    </ul>
                    <?php if(isset($_SESSION['cliente_id'])) : ?>
                    <a href="produto.php" class="btn btn-secondary mt-4">Voltar</a>
                    <form action="adicionar_carrinho.php" method="post" class="mt-3">
                    <input type="hidden" name="produto_id" value="<?= $peca['id'] ?>">
                    <label for="quantidade" class="form-label">Quantidade:</label>
                    <input type="number" name="quantidade" id="quantidade" value="1" min="1" class="form-control mb-2" style="width:100px;" required>
                    <button type="submit" class="btn btn-primary">Adicionar ao Carrinho</button>
            </form>
            <?php else : ?>
            <a href="produto.php" class="btn btn-secondary mt-4">Voltar</a>
            <?php endif ; ?>
                </div>
            </div>
        <?php else: ?>
            <p class="text-danger">Peça não encontrada.</p>
        <?php endif; ?>
    </div>

<?php include_once"../templates/footer.php"?>