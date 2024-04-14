<?php
session_start();
require_once __DIR__ . "/functions/ConnectDB.php";
require_once __DIR__ . "/classes/FileUpload.php";
require_once __DIR__ . "/classes/UserTable.php";
require_once __DIR__ . "/classes/Utils.php";
require_once __DIR__ . "/classes/success.php";


$userId = $_SESSION['userInfos']['id'];

try {
    $pdo = getDbConnection();
    $imagesDb = new UserTable($pdo);
} catch (PDOException) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

$isUploaded = false;

if (isset($_FILES['userPicture'])) {
    try {
        // on met le fichier dans une variable pour une meilleure lisibilité
        $file = $_FILES['userPicture'];
        $fileUpload = new FileUpload(
            $file,
            __DIR__ . "/uploads/user"
        );
        $uploadedFilename = $fileUpload->upload();
        $isUploaded = true;

        $oldFilename = $_SESSION['userInfos']['picture'];
        if (!empty($oldFilename)) {
            $imagesDb->deleteImage($oldFilename);
        }

        $imagesDb->updatePicture(
            [
                'user_picture' => $uploadedFilename,
            ],
            $userId
        );
        $_SESSION['userInfos']['picture'] = $uploadedFilename;

        Utils::redirect('user_profil.php');
    } catch (PDOException $e) {
    }
}
