<?php
require_once __DIR__ . "/layout/header.php";
if (empty($_SESSION['userInfos'])) {
    header('Location: home.php');
    exit();
}
require_once __DIR__ . "/layout/navbar.php";
require_once __DIR__ . "/functions/ConnectDB.php";
require_once __DIR__ . "/classes/FriendshipsTable.php";

try {
    $pdo = getDbConnection();
    $friendsDb = new FriendshipsTable($pdo);
} catch (PDOException) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}



$friends = $friendsDb->findFriends($_SESSION["userInfos"]["id"]);
?>
<section id="create-post" class="section4 mt-4">
    <div class="container">
        <div class="row ligne space-between">
            <div class="col-lg">
                <div class="row ligne space-between">
                    <div class="col-lg-4">
                        <div class="border-none mb-4">
                            <div class="text-center">
                                <h3>Friends</h3>
                                <div class="mb-4 text-center card card-friends p-5">
                                    <?php
                                    foreach ($friends as $friend) {
                                        $image = !empty($friend['user_picture']) ? 'uploads/user/' . $friend['user_picture'] : 'assets/default-img-friends.jpg';
                                    ?>
                                        <div class="d-flex align-items-center mb-4">
                                            <img src="<?php echo $image; ?>" alt="img-user" class="img-fluid rounded-pill img-friends me-3" style="width: 40px; height: 40px;">
                                            <p class="mb-0">
                                                <?php echo strtoupper($friend['complete_name']); ?>
                                                <span class="badge text-bg-secondary rounded-pill ms-3">Offline</span>
                                            </p>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="border-none mb-4">
                            <div class="text-center">
                                <h3>Post</h3>
                            </div>
                            <form action="user_postProcess.php" method="POST" class="mt-5" enctype="multipart/form-data">

                                <div class="form-group has-error">
                                    <label for="avatar">Choose a post picture:</label>
                                    <input type="file" id="image" name="postPicture" accept="image/png, image/jpeg" />
                                </div>

                                <div class="form-group mt-3">
                                    <label for="description">Description</label>
                                    <textarea rows="10" class="form-control mt-3" name="description"></textarea>
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary rounded-pill">
                                        Post
                                    </button>
                                    <button class="btn btn-default">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>