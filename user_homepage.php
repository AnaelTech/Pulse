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

if (!isset($_SESSION['userInfos'])) {
    header('Location: home.php');
    exit();
}


$friends = $friendsDb->findFriends($_SESSION["userInfos"]["id"]);
$postfriends = $postDb->findFriendPosts($_SESSION['userInfos']['id']);
$posts = array_merge($postDb->findAll());
?>

<section id="user-homepage" class="section-friend"> <!-- ICI on met si on veut un backgroud à la section en ajoutant sa class -->
    <div class="container"> <!-- container si on touche pas container-fluid si on touche -->
        <h1 class="text-center py-4">Actuality</h1>
        <div class="row ligne space-between">
            <div class="col-lg">
                <div class="row ligne space-between">
                    <div class="col-lg-4">
                        <div class="card card-user mb-4">
                            <div class="d-flex flex-row mb-4 justify-content-center">
                                <img src="uploads/user/<?= $_SESSION['userInfos']['picture']; ?>" alt="img-user" class="img-fluid rounded-pill" style="width: 40px; height: 40px;">
                                <h4 class="px-4"><?= $_SESSION['userInfos']['name']; ?></h4>
                            </div>
                            <div class="d-flex flex-row text-center">
                                <p class="px-4"><?= count($friends) ?> FOLLOWERS</p>
                                <p class="px-4"><?= count($posts) ?> POSTS</p>
                            </div>
                        </div>
                        <div class="mb-4 text-center">
                            <h3>Friends</h3>
                            <div class="mb-4 text-center card card-friends">
                                <?php
                                foreach ($friends as $friend) {
                                    $image = !empty($friend['user_picture']) ? 'uploads/user/' . $friend['user_picture'] : 'assets/default-img-friends.jpg';
                                ?>
                                    <div class="d-flex align-items-center mb-4">
                                        <img src="<?php echo $image; ?>" alt="img-user" class="img-fluid rounded-pill img-friends me-3" style="width: 40px; height: 40px;">
                                        <p class="mb-0">
                                            <?php echo strtoupper($friend['complet_name']); ?>
                                            <span class="badge text-bg-secondary rounded-pill ms-3">Offline</span>
                                        </p>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
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