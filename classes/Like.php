<?php

require_once __DIR__ . '/Table.php';

class Like extends Table
{
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, 'Posts');
    }

    function getUserLikedPosts($pdo, $userId)
    {
        $sql = 'SELECT id_post FROM likes WHERE id_user = :user_id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    function likePost($pdo, $userId, $postId)
    {
        $sql = 'SELECT COUNT(*) FROM likes WHERE id_user = :user_id AND id_post = :post_id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['user_id' => $userId, 'post_id' => $postId]);
        $count = $stmt->fetchColumn();

        if ($count == 0) {
            $sql = 'INSERT INTO likes (id_user, id_post, createdAt) VALUES (:user_id, :post_id, NOW())';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['user_id' => $userId, 'post_id' => $postId]);
        }
    }
    function dislikePost($pdo, $userId, $postId)
    {
        $sql = 'DELETE FROM likes WHERE id_user = :id_user AND id_post = :id_post';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_user' => $userId, 'id_post' => $postId]);
    }
}
