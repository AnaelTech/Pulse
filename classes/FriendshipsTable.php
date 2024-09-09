<?php

require_once __DIR__ . '/Table.php';

class FriendshipsTable extends Table
{
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, 'friendships');
    }

    public function addFriendship(int $idUser, int $idFriend): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO " . $this->name . " (user_id, friend_id) VALUES (:id_user, :id_friend)");

        $stmt->bindValue(':id_user', $idUser);
        $stmt->bindValue(':id_friend', $idFriend);

        $stmt->execute();
    }

    public function removeFriendship(int $idUser, int $idFriend): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM " . $this->name . " WHERE user_id = :id_user AND friend_id = :id_friend");

        $stmt->bindValue(':id_user', $idUser);
        $stmt->bindValue(':id_friend', $idFriend);

        $stmt->execute();
    }

    public function findFriends(int $id): array
    {
        $stmt = $this->pdo->prepare("
            SELECT 
                CONCAT(u.user_name, ' ', u.user_lastname) AS complete_name, 
                u.user_picture
            FROM Users u
            INNER JOIN " . $this->name . " f ON u.id_user = f.friend_id
            WHERE f.user_id = :id
        ");

        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isFriend(int $currentUserId, int $userId): bool
    {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM " . $this->name . " WHERE user_id = :currentUserId AND friend_id = :userId");

            $stmt->execute([
                ':currentUserId' => $currentUserId,
                ':userId' => $userId
            ]);

            $count = $stmt->fetchColumn();

            return $count > 0;
        } catch (PDOException $e) {
            echo "Erreur lors de la vérification de l'ami : " . $e->getMessage();
            return false;
        }
    }
}
