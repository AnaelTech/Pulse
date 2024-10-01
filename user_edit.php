<?php
require_once __DIR__ . "/layout/header.php";
if (empty($_SESSION['userInfos'])) {
    header('Location: home.php');
    exit();
}
require_once __DIR__ . "/layout/navbar.php";
require_once __DIR__ . "/classes/UserPost.php";
require_once __DIR__ . "/functions/ConnectDB.php";
require_once __DIR__ . "/classes/FriendshipsTable.php";
require_once __DIR__ . '/classes/Like.php';


try {
    $pdo = getDbConnection();
} catch (PDOException) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}
