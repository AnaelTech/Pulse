<?php

require_once __DIR__ . '/Table.php';

class FriendshipsTable extends Table
{
    public function __construct(
        PDO $pdo,
    ) {
        parent::__construct($pdo, 'friendships');
    }

    public function addFriendships(PDO $pdo, int $idUser, int $idFriend): void
    {

        $stmt = $pdo->prepare("INSERT INTO " . $this->name . "(user_id, friend_id) VALUES ( :id_user, :id_friend)");

        $stmt->bindValue('id_user', $idUser);
        $stmt->bindValue('id_friend', $idFriend);

        $stmt->execute();
    }

    public function findFriends(int $id): array
    {
        $stmt = $this->pdo->prepare("SELECT CONCAT(u.user_name, ' ', u.user_lastname) AS complet_name
        FROM Users u
        INNER JOIN " . $this->name . " ON u.id_user = friend_id WHERE user_id =(SELECT id_user FROM Users WHERE id_user = :id);
        ");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
