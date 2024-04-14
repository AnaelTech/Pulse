<?php
session_start();

require_once __DIR__ . "/classes/Utils.php";
if (isset($_SESSION['userInfos']['id'])) {
    require_once __DIR__ . "/classes/FriendshipsTable.php";
    require_once __DIR__ . "/functions/ConnectDB.php";


    $idUser = $_SESSION['userInfos']['id'];

    $idFriend = $_POST['friend_id'];

    try {
        $pdo = getDbConnection();
        $friendship = new FriendshipsTable($pdo);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    // Ajoutez la relation d'amitié en appelant la méthode addFriendships
    $friendship->addFriendships($pdo, $idUser, $idFriend);
    // Redirigez l'utilisateur vers une page de confirmation ou toute autre page appropriée
    Utils::redirect('addrequestsuccess.php');
    exit;
} else {
    // Redirigez l'utilisateur vers une page de connexion s'il n'est pas connecté
    Utils::redirect('home.php');
    exit;
}
