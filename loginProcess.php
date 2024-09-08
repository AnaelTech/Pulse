<?php
session_start();

require_once 'classes/error.php';
require_once 'classes/Utils.php';
require_once 'functions/ConnectDB.php';
require_once __DIR__ . '/classes/email.php';
require_once __DIR__ . '/classes/UserTable.php';

// Détecter si c'est la version mobile ou desktop
$source = isset($_GET['source']) ? $_GET['source'] : 'desktop';

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    Utils::redirect($source === 'mobile' ? 'login-responsive.php' : 'home.php');
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
    Utils::redirect($source === 'mobile' ? 'login-responsive.php?error=' . Errors::DB_CONNECTION : 'home.php?error=' . Errors::DB_CONNECTION);
}

if ($user === false) {
    Utils::redirect($source === 'mobile' ? 'login-responsive.php?error=' . Errors::INVALID_ARGUMENT : 'home.php?error=' . Errors::INVALID_ARGUMENT);
}

$fakePasswordHash = '$2y$10$usesomesillystringforsalt$';
$storedPasswordHash = $user ? $user['user_password'] : $fakePasswordHash;

if (!password_verify($password, $storedPasswordHash)) {
    Utils::redirect($source === 'mobile' ? 'login-responsive.php?error=invalid_credentials' : 'home.php?error=invalid_credentials');
}

$_SESSION['userInfos'] = [
    'id' => $user['id_user'],
    'name' => $user['user_name'],
    'lastname' => $user['user_lastname'],
    'picture'  => $user['user_picture'],
];

// Redirection en fonction de la source
Utils::redirect($source === 'mobile' ? 'mobile_homepage.php' : 'user_homepage.php');
