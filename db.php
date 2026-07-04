<?php

$config = require __DIR__ . '/config.php';

$db = $config['db'];

$dsn = "mysql:host={$db['host']};dbname={$db['name']}";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$db['charset']}"
];

try {
    $pdo = new PDO(
        $dsn,
        $db['user'],
        $db['pass'],
        $options
    );
} catch (PDOException $e) {
    if (
        isset($db['charset']) &&
        $db['charset'] === 'utf8mb4' &&
        stripos($e->getMessage(), 'Server sent charset') !== false
    ) {
        try {
            $options[PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES utf8';
            $pdo = new PDO(
                $dsn,
                $db['user'],
                $db['pass'],
                $options
            );
        } catch (PDOException $inner) {
            die("Erreur de connexion : " . $inner->getMessage());
        }
    } else {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

return $pdo;