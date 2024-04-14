<?php

function getDbConnection(): PDO
{
    $settings = parse_ini_file(__DIR__ . '/../config/db.ini');
    [
        'DB_HOST' => $dbHost,
        'DB_PORT' => $dbPort,
        'DB_NAME' => $dbName,
        'DB_CHARSET' => $charset,
        'DB_USER' => $user,
        'DB_PASSWORD' => $password
    ] = $settings;

    $dsn = "mysql:host=$dbHost;port=$dbPort;dbname=$dbName;charset=$charset";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    try {
        $pdo = new PDO($dsn, $user, $password, $options);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
    return $pdo;
}
