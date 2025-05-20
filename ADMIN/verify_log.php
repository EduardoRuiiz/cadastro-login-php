<?php
session_start();
require_once '../SERVER/db_connect.php';
if (!isset($_SESSION['admin_id'])) {
    header('Location: login_adm.php');
    exit;
}

?>