<?php
session_start();
require_once __DIR__ . "/classes/Utils.php";
require_once __DIR__ . "/classes/UserRegist.php";
require_once __DIR__ . "/classes/error.php";
require_once __DIR__ . "/functions/ConnectDB.php";


try {
    $pdo = getDbConnection();

    $register = new Register(
        $_POST['lastname'] ?? '',
        $_POST['name'] ?? '',
        $_POST['email'] ?? '',
        $_POST['password'] ?? '',
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
