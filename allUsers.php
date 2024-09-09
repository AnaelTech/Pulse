<?php
require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/layout/navbar.php";
require_once __DIR__ . "/functions/ConnectDB.php";
require_once __DIR__ . "/classes/UserSearch.php";
require_once __DIR__ . "/classes/UserTable.php";
require_once __DIR__ . "/classes/FriendshipsTable.php";

if (!isset($_SESSION['userInfos'])) {
    header('Location: home.php');
    exit();
}

if (!isset($_GET['search']) && empty($_GET['search'])) {
    try {
        $pdo = getDbConnection();
        $users = new UserTable($pdo);
        $isFriendDb = new FriendshipsTable($pdo);
        $users = $users->findAll();
    } catch (PDOException $e) {
        echo "Erreur lors de la connexion à la base de données";
        exit;
    }
} else {
    // Utiliser la valeur du paramètre de recherche pour effectuer une nouvelle requête et récupérer les résultats
    try {
        $search = htmlspecialchars($_GET['search']);
        $pdo = getDbConnection();
        $users = new UserSearch($pdo);
        $users = $users->findByName($search);
    } catch (Exception $e) {
        echo "Erreur lors de la connexion à la base de données";
        exit;
    }
}

$currentUserId = $_SESSION['userInfos']['id'];
?>
<section id="all-users" class="mt-5">
    <div class="container">
        <div class="row">
            <?php
            foreach ($users as $user) {
                if ($user['id_user'] != $currentUserId) {
                    $isFriend = $isFriendDb->isFriend($currentUserId, $user['id_user']);
                    require 'templates/card-search-user.php';
                }
            }
            ?>
        </div>
    </div>
</section>