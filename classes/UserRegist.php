<?php
require_once __DIR__ . "/email.php";
require_once __DIR__ . "/Execpt/EmailDuplic.php";
require_once __DIR__ . "/Execpt/EmailExcept.php";
require_once __DIR__ . "/Execpt/EmptyExcept.php";

class Register
{
    private Email $email;

    public function __construct(
        private string $lastname,
        private string $name,
        string $email,
        private string $password,
    ) {

        $this->email = new Email($email);
        if (empty($lastname) || empty($name) || empty($email) || empty($password)) {
            throw new EmptyExcept();
        }
    }

    public function addInscription(PDO $pdo): void
    {
        $email = $this->email->getEmail();

        $lastname = $this->lastname;
        $name = $this->name;
        $password = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare('INSERT INTO Users (user_email, user_lastname, user_name, user_password) VALUES ( :email, :last_name, :name,:password)');

        $stmt->bindValue('email', $email);
        $stmt->bindValue('last_name', $lastname);
        $stmt->bindValue('name', $name);
        $stmt->bindValue('password', $password);

        $stmt->execute();
    }

    public function getLastName(): string
    {
        return $this->lastname;
    }
    public function setLastName(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
}
