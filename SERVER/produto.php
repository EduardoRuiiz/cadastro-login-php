<?php

require_once 'db_connect.php';
$query = "SELECT * FROM produtos WHERE categoria_id = (SELECT id FROM categorias WHERE nome = 'Peças')";
$result = $connect->query($query);

?>
<?php include_once "../templates/header.php" ?>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="display-4 fw-bold text-body-emphasis lh-1 mb-3">Aqui você encontra os melhores produtos do mercado!
        </h1>
        <p class="lead text-muted">Os melhores produtos do merdado com as melhores ofertas.</p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php while ($peca = $result->fetch_assoc()): ?>
          <div class="col">
            <div class="card shadow-sm">
              <img src="../ADMIN/uploads/<?= htmlspecialchars($peca['imagem']) ?>" class="bd-placeholder-img card-img-top"
                width="100%" height="400" alt="<?= htmlspecialchars($peca['nome']) ?>">
              <div class="card-body">
                <p class="card-text"><?= htmlspecialchars($peca['nome']) ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                      <a href="parts_details.php?id=<?= $peca['id'] ?>"
                        class="text-decoration-none text-dark">Visualizar</a>
                    </button>
                  </div>
                  <strong class="text-body-secondary">A partir de: R$
                    <?= number_format($peca['preco'], 2, ',', '.') ?></strong>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>

<?php include_once"../templates/footer.php"?>