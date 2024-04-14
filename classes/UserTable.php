<?php

require_once __DIR__ . '/Table.php';

class UserTable extends Table
{
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, 'Users');
    }

    public function updatePicture(array $data, int $userId)
    {
        $updateQuery = "UPDATE " . $this->name . " SET user_picture=:imageFilename WHERE id_user=:userId";
        // 1 - Préparation
        $stmt = $this->pdo->prepare($updateQuery);
        // 2 - Exécution
        $stmt->execute(
            [
                'imageFilename' => $data['user_picture'],
                'userId' => $userId,
            ],
        );
    }

    public function deleteImage(string $filename)
    {
        $filePath = __DIR__ . "/../uploads/user/" . $filename;
        if (file_exists($filePath)) {
            unlink($filePath);
            return true; // Retourne true si la suppression est réussie
        }
        return false; // Retourne false si le fichier n'existe pas ou s'il y a une erreur lors de la suppression
    }

    public function findUsersEmail(string $email)
    {
        $query = "SELECT * FROM Users WHERE user_email = :email";
        $connectStmt = $this->pdo->prepare($query);
        $connectStmt->execute(['email' => $email]);
        // Récupération de l'utilisateur
        return $connectStmt->fetch();
    }


    // public function getOldPictureFilename(int $userId): string
    // {
    //     $stmt = $this->pdo->prepare("SELECT user_picture FROM " . $this->name . " WHERE id=:id");
    //     $stmt->execute(['id' => $userId]);
    //     return $stmt->fetchColumn();

    //     if ($stmt === true && file_exists(__DIR__ . "/uploads/user" . $stmt)) {
    //         unlink(__DIR__ . "/uploads/user" . $stmt);
    //     }
    // }
}
