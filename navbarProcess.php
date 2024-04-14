<?php
require_once __DIR__ . '/classes/Utils.php';
require_once __DIR__ . '/functions/ConnectDB.php';


if (isset($_GET['search']) and !empty($_GET['search'])) {
    $pdo = getDbConnection();
    $search = htmlspecialchars($_GET['search']);
    $allusers = $pdo->query('SELECT user_name FROM Users WHERE user_name LIKE "%' . $search . '%"');
    if ($allusers->rowCount() > 0) {
        // Rediriger vers allUsers.php avec le paramètre de recherche dans l'URL

        Utils::redirect('allUsers.php?search=' . urlencode($search));
        exit();
    } else {
        // Aucun résultat trouvé
        Utils::redirect('allUsers.php?error=no_results');
        exit();
    }
} else {
    // Rediriger vers allUsers.php si aucun terme de recherche n'est fourni
    Utils::redirect('allUsers.php');
    exit();
}
