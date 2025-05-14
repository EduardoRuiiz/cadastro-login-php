<?php
require_once '../../SERVER/db_connect.php';
function listarProdutos()
{
    global $connect;
    $query = "SELECT p.*, c.nome AS nome_categoria FROM produtos p JOIN categorias c ON p.categoria_id = c.id";
    $result = $connect->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}
function criarProduto($nome, $descricao, $preco, $imagem, $categoria_id)
{
    global $connect;
    $stmt = $connect->prepare("INSERT INTO produtos (nome, descricao, preco, imagem, categoria_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsi", $nome, $descricao, $preco, $imagem, $categoria_id);
    return $stmt->execute();
}
function buscarProduto($id)
{
    global $connect;
    $stmt = $connect->prepare("SELECT p.*, c.nome AS nome_categoria 
              FROM produtos p 
              JOIN categorias c ON p.categoria_id = c.id 
              WHERE p.id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}
function atualizarProduto($id, $nome, $descricao, $preco, $imagem, $categoria_id)
{
    global $connect;
    $stmt = $connect->prepare("UPDATE produtos SET nome = ?, descricao = ?, preco = ?, imagem = ?, categoria_id = ? WHERE id = ?");
    $stmt->bind_param("ssdsii", $nome, $descricao, $preco, $imagem, $categoria_id, $id);
    return $stmt->execute();
}
function deletarProduto($id)
{
    global $connect;
    $stmt = $connect->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
function buscarProdutosPorNome($nome)
{
    global $connect;
    $stmt = $connect->prepare("SELECT p.*, c.nome AS nome_categoria FROM produtos p 
                               JOIN categorias c ON p.categoria_id = c.id 
                               WHERE p.nome LIKE ?");
    $likeNome = "%" . $nome . "%";
    $stmt->bind_param("s", $likeNome);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}
function buscarProdutosPorCategoria($categoria)
{
    global $connect;
    $stmt = $connect->prepare("SELECT p.*, c.nome AS nome_categoria FROM produtos p 
                               JOIN categorias c ON p.categoria_id = c.id 
                               WHERE c.nome LIKE ?");
    $likeCategoria = "%" . $categoria . "%";
    $stmt->bind_param("s", $likeCategoria);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}
function buscarProdutosPorPreco($preco)
{
    global $connect;
    $stmt = $connect->prepare("SELECT p.*, c.nome AS nome_categoria FROM produtos p 
                               JOIN categorias c ON p.categoria_id = c.id 
                               WHERE p.preco <= ?");
    $stmt->bind_param("d", $preco); // "d" para valores decimais
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>