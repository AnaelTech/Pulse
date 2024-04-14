<?php

session_start();

require_once 'classes/error.php';
require_once 'classes/Utils.php';
require_once 'functions/ConnectDB.php';
require_once __DIR__ . '/classes/email.php';
require_once __DIR__ . '/classes/UserTable.php';


if (!isset($_POST['email']) || !isset($_POST['password'])) {
    Utils::redirect('login.php');
}

[
    'email' => $email,
    'password' => $password
] = $_POST;

try {
    $pdo = getDbConnection();
    $connectStmt = new UserTable($pdo);
    $user = $connectStmt->findUsersEmail($email);
} catch (PDOException) {
    Utils::redirect('home.php?error=' . Errors::DB_CONNECTION);
}

if ($user === false) {
    Utils::redirect('home.php?error=' . Errors::INVALID_ARGUMENT);
}

// Vérification du mot de passe
if (!password_verify($password, $user['user_password'])) {
    Utils::redirect('home.php?error=' . Errors::INVALID_ARGUMENT);
}

$_SESSION['userInfos'] = [
    'id' => $user['id_user'],
    'name' => $user['user_name'],
    'lastname' => $user['user_lastname'],
    'picture'  => $user['user_picture'],
];

Utils::redirect('user_homepage.php');
