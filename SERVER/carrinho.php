<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/SERVER/db_connect.php';
?>
<?php include_once "../templates/header.php" ?>
<div class="container">
    <h2 style="text-align: center">Seu Carrinho</h2>
    <?php
    if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
        echo "<table class='carrinho-table'><tr><th>Produto</th><th>Categoria</th><th>Quantidade</th><th>Preço</th><th>Total</th></tr>";
        $total = 0;
        foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
            // Buscar dados do produto e da categoria
            $sql = "SELECT p.nome, p.preco, c.nome AS categoria_nome 
                    FROM produtos p 
                    JOIN categorias c ON p.categoria_id = c.id 
                    WHERE p.id = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("i", $produto_id);
            $stmt->execute();
            $stmt->bind_result($nome, $preco, $categoria_nome);
            $stmt->fetch();
            $stmt->close();

            $subtotal = $preco * $quantidade;
            $total += $subtotal;

            echo "<tr>
                    <td>{$nome}</td>
                    <td>{$categoria_nome}</td>
                    <td>{$quantidade}</td>
                    <td>R$ " . number_format($preco, 2, ',', '.') . "</td>
                    <td>R$ " . number_format($subtotal, 2, ',', '.') . "</td>
                  </tr>";
        }
        echo "<tr><td colspan='3'><strong>Total</strong></td><td><strong>R$ " . number_format($total, 2, ',', '.') . "</strong></td></tr>";
        echo "</table>";
        echo "<br><div class= 'carrinho-btn-wrapper'><a href='finalizar_compra.php' class='btn btn-success'>Finalizar Compra</a></div>";
    } else {
        echo "<p>Seu carrinho está vazio.</p>";
    }
    ?>
</div>
<?php include_once "../templates/footer.php" ?>