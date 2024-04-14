<?php
require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/layout/navbar.php";
require_once __DIR__ . "/classes/UserPost.php";
require_once __DIR__ . "/functions/ConnectDB.php";
require_once __DIR__ . "/classes/FriendshipsTable.php";

try {
    $pdo = getDbConnection();
    $postDb = new UserPost($pdo);
    $friendsDb = new FriendshipsTable($pdo);
} catch (PDOException) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}
$friends = $friendsDb->findFriends($_SESSION["userInfos"]["id"]);
$postfriends = $postDb->findFriendPosts($_SESSION['userInfos']['id']);
$posts = array_merge($postDb->findAll());
?>

<section class="section-friend"> <!-- ICI on met si on veut un backgroud à la section en ajoutant sa class -->
    <div class="container"> <!-- container si on touche pas container-fluid si on touche -->
        <h1 class="text-center py-4">Actuality</h1>
        <div class="row ligne space-between">
            <div class="col-lg">
                <div class="row ligne space-between">
                    <div class="col-lg-3">
                        <div class="mb-4 text-center">
                            <h3>Friends</h3>
                            <div class="mb-4 text-center">
                                <ul class="list-group">
                                    <?php
                                    foreach ($friends as $friend) {
                                        echo
                                        '<li class="list-group-item">' . strtoupper($friend['complet_name']) . '<span class="badge text-bg-secondary rounded-pill ms-3">Offline</span>' . '</li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="mb-4 text-center">
                            <h3>Posts</h3>
                            <div class="col-lg">
                                <div class="mb-4 text-center">
                                    <?php
                                    $found = false;
                                    foreach ($posts as $post) {
                                        if ($_SESSION['userInfos']['id'] === $post['user_id']) {
                                            require 'templates/card-post.php';
                                            $found = true;
                                        }
                                    }
                                    if (!$found) {
                                        echo "Nothing for you today";
                                    }
                                    foreach ($postfriends as $postfriend) {
                                        require 'templates/card-post.php';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>