<?php
require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/layout/navbar.php";
require_once __DIR__ . "/functions/ConnectDB.php";
require_once __DIR__ . "/classes/UserSearch.php";
require_once __DIR__ . "/classes/UserTable.php";

if (!isset($_GET['search']) && empty($_GET['search'])) {
    try {
        $pdo = getDbConnection();
        $users = new UserTable($pdo);
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
        // $stmt = $pdo->prepare('SELECT * FROM Users WHERE user_name LIKE ?');
        // $stmt->execute(["%$search%"]);
        // $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erreur lors de la connexion à la base de données";
        exit;
    }
} //{
//     $pdo = getDbConnection();
//     $stmt = $pdo->prepare('SELECT * FROM Users');
//     $stmt->execute();
//     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
// }
?>
<section class="mt-5">
    <div class="container">
        <div class="row">
            <?php
            foreach ($users as $user) {
                if ($user['id_user'] != $_SESSION['userInfos']['id']) {
                    require 'templates/card-search-user.php';
                }
            }
            ?>
        </div>
    </div>
</section>