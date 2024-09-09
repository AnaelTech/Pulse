<?php

require_once __DIR__ . '/Table.php';

class UserPost extends Table
{
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, 'Posts');
    }

    public function insert(array $data)
    {
        $insertQuery = "INSERT INTO " . $this->name . " (`post_image`, `post_content`, `user_id`, `post_date`) 
                    VALUES (:post_image, :post_content, :user_id, :post_date)";

        $stmt = $this->pdo->prepare($insertQuery);

        $stmt->execute([
            'post_image' => $data['post_image'],
            'post_content' => $data['post_content'],
            'user_id' => $data['user_id'],
            'post_date' => $data['post_date'], // Ajout de la date ici
        ]);
    }


    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM " . $this->name . " INNER JOIN Users ON user_id = id_user");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findFriendPosts($userId): array
    {
        $stmt = $this->pdo->prepare("
        SELECT *
        FROM " . $this->name . "
        INNER JOIN friendships  ON Posts.user_id = friendships.friend_id
        WHERE friendships .user_id = :userId
    ");
        $stmt->execute(['userId' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAllPost(int $id): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM " . $this->name . " WHERE user_id=:id ORDER BY id_post DESC");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
