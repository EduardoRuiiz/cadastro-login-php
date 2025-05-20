<?php
session_start();
if (!isset($_SESSION['cliente_id'])) {
    header('Location: /index.php?login_required=1');
    exit;
}
?>