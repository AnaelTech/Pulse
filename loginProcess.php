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

$fakePasswordHash = '$2y$10$usesomesillystringforsalt$';
$storedPasswordHash = $user ? $user['user_password'] : $fakePasswordHash;

if (!password_verify($password, $storedPasswordHash)) {
    Utils::redirect('login.php?error=invalid_credentials');
}

$_SESSION['userInfos'] = [
    'id' => $user['id_user'],
    'name' => $user['user_name'],
    'lastname' => $user['user_lastname'],
    'picture'  => $user['user_picture'],
];

Utils::redirect('user_homepage.php');
