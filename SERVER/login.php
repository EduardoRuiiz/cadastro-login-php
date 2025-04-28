<?php
require_once 'db_connect.php';
require_once '../index.php';
$telainicial = '../index.php';
$html = file_get_contents($telainicial);
$login = $_POST["login"];
$entrar = $_POST["entrar"];
$senha = $_POST["senha"];
$verifica = "SELECT * FROM usuarios WHERE login like '$login' and senha like '$senha'";
$db = mysqli_query($connect, $verifica);
$result = $connect->query($verifica);

if (mysqli_num_rows($result) <= 0) {
    echo ("Usuario não cadastrado.");
    return $html;
} else {
    return $html;
}

?>