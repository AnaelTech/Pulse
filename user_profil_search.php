<?php
require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/layout/navbar.php";
require_once __DIR__ . "/classes/UserPost.php";
require_once __DIR__ . "/functions/ConnectDB.php";
require_once __DIR__ . "/classes/UserTable.php";
require_once __DIR__ . "/classes/FriendshipsTable.php";

if (!isset($_SESSION['userInfos'])) {
    header('Location: home.php');
    exit();
}

if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
}


try {
    $pdo = getDbConnection();
    $user = new UserTable($pdo);
    $users = $user->find($userId);
    $postDbUser = new UserPost($pdo);
    $friendsDb = new FriendshipsTable($pdo);
    $friends = $friendsDb->findFriends($userId);
    $postsUser = $postDbUser->findAllPost($userId);
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données: " . $e->getMessage();
    exit;
}

$currentUserId = $_SESSION['userInfos']['id'];
$isFriend = $friendsDb->isFriend($currentUserId, $userId);
?>

<main>
    <section id="user_profil_search" class="h-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center h-100">
                <div class="col-lg">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row bg-user-profil-search">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img src="uploads/user/<?php echo htmlspecialchars($users['user_picture']); ?>" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5><?php echo htmlspecialchars($users['user_name']); ?></h5>
                                <h5><?php echo htmlspecialchars($users['user_lastname']); ?></h5>
                            </div>
                        </div>
                        <div class="p-5 text-black" style="background-color: #f8f9fa;">
                            <div class="form-group has-error">
                                <form action="<?php echo $isFriend ? 'removeFriendProcess.php' : 'addfriendsProcess.php'; ?>" method="POST" class="mb-3">
                                    <input type="hidden" name="friend_id" value="<?php echo htmlspecialchars($users['id_user']); ?>">
                                    <button class="btn btn-outline-secondary pull-right rounded-pill">
                                        <i class="bi <?php echo $isFriend ? 'bi-x' : 'bi-plus'; ?>"></i>
                                        <?php echo $isFriend ? 'Unfollow' : 'Add Friend'; ?>
                                    </button>
                                </form>
                            </div>
                            <div class="d-flex justify-content-end text-center py-1">
                                <div>
                                    <p class="mb-1 h5"><?php echo count($postsUser); ?></p>
                                    <p class="small text-muted mb-0">Posts</p>
                                </div>
                                <div class="px-3">
                                    <p class="mb-1 h5"><?php echo count($friends); ?></p>
                                    <p class="small text-muted mb-0">Friends</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4 text-black">
                            <div class="mb-5">
                                <p class="lead fw-normal mb-1">About</p>
                                <div class="p-4" style="background-color: #f8f9fa;">
                                    <p class="font-italic mb-1">Web Developer</p>
                                    <p class="font-italic mb-1">Lives in New York</p>
                                    <p class="font-italic mb-0">Photographer</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0">Recent Posts</p>
                            </div>
                            <div class="row">
                                <div class="col-lg d-flex mb-2">
                                    <?php
                                    foreach ($postsUser as $postUser) {
                                        require 'templates/card-post-historique.php';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>