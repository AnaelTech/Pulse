<?php
require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/layout/navbar.php";
require_once __DIR__ . "/classes/UserPost.php";
require_once __DIR__ . "/functions/ConnectDB.php";
require_once __DIR__ . "/classes/FriendshipsTable.php";

try {
    $pdo = getDbConnection();
    $postDbUser = new UserPost($pdo);
    $friendsDb = new FriendshipsTable($pdo);
} catch (PDOException) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}
$friends = $friendsDb->findFriends($_SESSION["userInfos"]["id"]);
$postsUser = array_merge($postDbUser->findAllPost($_SESSION['userInfos']['id']));
?>

<main>
    <section class="h-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center  h-100">
                <div class="col-lg">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img src="uploads/user/<?php echo $_SESSION['userInfos']['picture']; ?>" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5><?php echo $_SESSION['userInfos']['name']; ?></h5>
                                <h5><?php echo $_SESSION['userInfos']['lastname']; ?></h5>
                            </div>
                        </div>
                        <div class="p-5 text-black" style="background-color: #f8f9fa;">
                            <div class="form-group has-error ">
                                <form method="POST" enctype="multipart/form-data" action="user_profilProcess.php">
                                    <div class="pt-4">
                                        <input type="file" id="image" name="userPicture" />
                                    </div>
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-dark mt-3" data-mdb-ripple-color="dark" style="z-index: 1;" value="Envoyer">
                                        Edit Picture
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
                                <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
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