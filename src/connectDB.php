<?php
declare(strict_types=1);
session_start();
require 'function.php';
$pdo = connectPDO($host, $db_name, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if (isset ($_POST['connection'])) {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    connectionUser($pdo, $pseudo, $password);
}

if (isset($_GET['disconnect'])) {
    if ($_GET['disconnect'] == 1) {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}