<?php

require_once 'db_connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM produtos WHERE id =?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $moto = $result->fetch_assoc();
} else {
    die("ID da moto não fornecido");
}
?>

<?php include_once "../templates/reader.php" ?>

    <div class="container py-5">
        <?php if ($moto): ?>
            <div class="row">
                <!-- Imagem da moto -->
                <div class="col-md-6">
                    <img src="../ADMIN/uploads/<?= htmlspecialchars($moto['imagem']) ?>" class="img-fluid rounded shadow"
                        alt="<?= htmlspecialchars($moto['nome']) ?>">
                </div>

                <!-- Informações da moto -->
                <div class="col-md-6">
                    <h1 class="display-5 fw-bold mb-4" style="font-family: 'Audiowide', sans-serif; color: #333;">
                        <?= htmlspecialchars($moto['nome']) ?>
                    </h1>
                    <p class="text-muted fs-5"><strong>A partir de:</strong> R$
                        <?= number_format($moto['preco'], 2, ',', '.') ?>
                    </p>
                    <hr>
                    <h4 class="mt-4" style="font-family: 'Rajdhani', sans-serif; color: #555;">Descrição:</h4>
                    <ul class="list-unstyled mt-3"
                        style="font-family: 'Rajdhani', sans-serif; font-size: 1.1rem; line-height: 1.8; color: #444;">
                        <?php
                        // Divida a descrição em linhas para exibir como lista
                        $descricao = explode("\n", htmlspecialchars($moto['descricao']));
                        foreach ($descricao as $linha):
                            if (!empty(trim($linha))): ?>
                                <li><i class="bi bi-chevron-right text-primary"></i> <?= $linha ?></li>
                            <?php endif;
                        endforeach;
                        ?>
                    </ul>
                    <a href="motosDisponiveis.php" class="btn btn-secondary mt-4">Voltar</a>
                </div>
            </div>
        <?php else: ?>
            <p class="text-danger">Moto não encontrada.</p>
        <?php endif; ?>
    </div>

<?php include_once"../templates/footer.php"?>
