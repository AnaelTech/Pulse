<?php
session_start();
require_once __DIR__ . "/classes/Utils.php";
require_once __DIR__ . "/classes/UserRegist.php";
require_once __DIR__ . "/classes/error.php";
require_once __DIR__ . "/functions/ConnectDB.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    Utils::redirect('inscription.php?error=invalid_request');
    exit;
}

// Vérification du token CSRF
if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    Utils::redirect('inscription.php?error=invalid_csrf');
    exit;
}

$lastname = htmlspecialchars(trim($_POST['lastname'] ?? ''), ENT_QUOTES, 'UTF-8');
$name = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$password = $_POST['password'] ?? '';

// Vérification de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    Utils::redirect('inscription.php?error=invalid_email');
    exit;
}

try {
    $pdo = getDbConnection();

    $register = new Register(
        $lastname,
        $name,
        $email,
        $password
    );

    $register->addInscription($pdo);
    $_SESSION['userInfos'] = [
        'id' => $pdo->lastInsertId(),
    ];
    Utils::redirect('home.php');
} catch (EmptyExcept $e) {
    Utils::redirect('inscription.php?error=' . $e->getCode());
} catch (DuplicateEmailException  | InvalidEmailException $e) {
    Utils::redirect('inscription.php?error=' . $e->getCode());
} catch (PDOException | Exception $e) {
    Utils::redirect('inscription.php?error=' . $e->getMessage());
}
