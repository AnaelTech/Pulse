<?php

class UserSearch
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findByName($name)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Users WHERE user_name LIKE :name");
        $stmt->execute([':name' => "%$name%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
