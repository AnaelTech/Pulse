<?php
session_start();
require_once __DIR__ . "/functions/ConnectDB.php";
require_once __DIR__ . "/classes/FileUpload.php";
require_once __DIR__ . "/classes/UserPost.php";
require_once __DIR__ . "/classes/Utils.php";
require_once __DIR__ . "/classes/success.php";

$userId = $_SESSION['userInfos']['id'];

try {
    $pdo = getDbConnection();
    $imagesDb = new UserPost($pdo);
} catch (PDOException) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}


if (isset($_FILES['postPicture'])) {
    try {
        // on met le fichier dans une variable pour une meilleure lisibilité
        $file = $_FILES['postPicture'];
        $fileUpload = new FileUpload(
            $file,
            __DIR__ . "/uploads/post"
        );
        $uploadedFilename = $fileUpload->upload();
        $isUploaded = true;
        $imagesDb->insert([
            'post_image' => $uploadedFilename,
            'post_content' => $_POST['description'],
            'user_id' => $userId,

        ],);

        Utils::redirect('user_homepage.php');
    } catch (PDOException $e) {
    }
}
