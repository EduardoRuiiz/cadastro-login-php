<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "sistema";

$connect = new mysqli($servername, $username, $password, $dbname);

if ($connect->connect_error) {
    die("Falha na conexão: " . $connect->connect_error);
}