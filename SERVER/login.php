<?php
session_start();
require_once 'db_connect.php';
require_once '../index.php';

if ($_SERVER['REQUEST_METHOD'] === "POST")
$client_username = $_POST["login"];
$client_password = $_POST["senha"];


?>
