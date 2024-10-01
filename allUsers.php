<?php
ob_start();
require_once __DIR__ . "/layout/header.php";
if (!isset($_SESSION['userInfos'])) {
    header('Location: home.php');
    exit();
}

require_once __DIR__ . "/layout/navbar.php";
require_once __DIR__ . "/functions/ConnectDB.php";
require_once __DIR__ . "/classes/UserSearch.php";
require_once __DIR__ . "/classes/UserTable.php";
require_once __DIR__ . "/classes/FriendshipsTable.php";

try {
    $pdo = getDbConnection();
    $isFriendDb = new FriendshipsTable($pdo); // Défini ici pour les deux blocs
    if (!isset($_GET['search']) && empty($_GET['search'])) {
        $users = new UserTable($pdo);
        $users = $users->findAll();
    } else {
        $search = htmlspecialchars($_GET['search']);
        $users = new UserSearch($pdo);
        $users = $users->findByName($search);
    }
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

$currentUserId = $_SESSION['userInfos']['id'];
ob_end_flush();
?>

<section id="all-users" class="mt-5">
    <h1 class="text-center my-4">Résultat de votre recherche</h1>
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