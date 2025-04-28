<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "sistema";

// Criar conexão
$connect = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($connect->connect_error) {
    die("Falha na conexão: " . $connect->connect_error);
}