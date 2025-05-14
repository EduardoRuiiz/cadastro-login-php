<?php
require_once '../../SERVER/db_connect.php';

function criarCategoria($nome)
{
    global $connect;
    $stmt = $connect->prepare("INSERT INTO categorias (nome) VALUES (?)");
    $stmt->bind_param("s", $nome);
    return $stmt->execute();
}

function listarCategorias()
{
    global $connect;
    $result = $connect->query("SELECT * FROM categorias");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function buscarCategoria($id)
{
    global $connect;
    $stmt = $connect->prepare("SELECT * FROM categorias WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function atualizarCategoria($id, $nome)
{
    global $connect;
    $stmt = $connect->prepare("UPDATE categorias SET nome = ? WHERE id = ?");
    $stmt->bind_param("si", $nome, $id);
    return $stmt->execute();
}

function deletarCategoria($id)
{
    global $connect;
    $stmt = $connect->prepare("DELETE FROM categorias WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>