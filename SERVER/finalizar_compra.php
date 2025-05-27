<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/SERVER/db_connect.php';
?>
<?php include_once "../templates/header.php" ?>
<?php
$total = 0;
foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
    $sql = "SELECT preco FROM produtos WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $produto_id);
    $stmt->execute();
    $stmt->bind_result($preco);
    $stmt->fetch();
    $stmt->close();
    $total += $preco * $quantidade;
}

// Insira a venda
$sql = "INSERT INTO vendas (cliente_id, total) VALUES (?, ?)";
$stmt = $connect->prepare($sql);
$cliente_id = $_SESSION['cliente_id']; // ajuste conforme seu sistema de login
$stmt->bind_param("id", $cliente_id, $total);
$stmt->execute();
$venda_id = $stmt->insert_id;
$stmt->close();

// Insira os itens da venda
foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
    $sql = "SELECT preco FROM produtos WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $produto_id);
    $stmt->execute();
    $stmt->bind_result($preco);
    $stmt->fetch();
    $stmt->close();

    $sql = "INSERT INTO itens_venda (venda_id, produto_id, quantidade, preco_unitario) VALUES (?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("iiid", $venda_id, $produto_id, $quantidade, $preco);
    $stmt->execute();
    $stmt->close();
}
?>

<div class="agradecimento-container">
    <div class="agradecimento-card">
        <h1>
            <?php
            $nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Cliente';
            echo "Obrigado pela sua compra, $nome!";
            ?>
            </h1>
        <p>Sua compra foi realizada com sucesso.<br>
        Em breve você receberá um e-mail com os detalhes do pedido.</p>
        <a href="/index.php" class="btn-voltar">Voltar para a loja</a>
    </div>
</div>

<?php include_once "../templates/footer.php" ?>
