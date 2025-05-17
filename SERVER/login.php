<?php
require_once 'db_connect.php';
require_once '../index.php';
$login = $_POST["login"];
$entrar = $_POST["entrar"];
$senha = $_POST["senha"];
$verifica = "SELECT * FROM usuarios WHERE login like '$login' and senha like '$senha'";
$db = mysqli_query($connect, $verifica);
$result = $connect->query($verifica);

if (mysqli_num_rows($result) <= 0) {
    header("Location: errologin.php");
    exit();
} else {
    header("Location: logado.php");
    exit();
}

?>
