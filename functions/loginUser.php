<?php
require_once __DIR__ . '/classes/error.php';
require_once __DIR__ . '/functions/ConnectDB.php';

try {
    $pdo = getDbConnection();
} catch (PDOException) {
    echo "La connexion à la base de données n'a pas pu être établie";
    exit;
}

function loginUser(PDO $pdo, string $email, string $password): bool
{
    if (empty($email) || empty($password)) {
        return false; // Login failed due to empty fields
    }

    $query = $pdo->prepare("SELECT * FROM Users WHERE user_email = ?");
    $query->execute([$email]);
    $user = $query->fetch();

    if ($user && password_verify($password, $user['user_password'])) {
        $_SESSION['email'] = $email;
        // Don't store password in plain text
        $_SESSION['id'] = $user['id_user'];
        $_SESSION['name'] = $user['user_name'];
        return true; // Login successful
    }

    return false; // Login failed due to invalid credentials
}

if (isset($_POST['valider'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (loginUser($pdo, $email, $password)) {
        header('Location: user_homepage.php');
        exit;
    } else {
        // Redirect with error message (consider using a framework for easier handling)
        header('Location: index.php?error=' . self::INVALID_ARGUMENT);
        exit();
    }
}
