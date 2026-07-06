<?php
$config = require __DIR__ . '/app/config.php';
$db = $config['db'];
$dsn = 'mysql:host=' . $db['host'] . ';dbname=' . $db['name'];
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn, $db['user'], $db['pass'], $options);

$stmt = $pdo->prepare('SELECT id FROM categories WHERE nom = ?');
$stmt->execute(['Poesie']);
$row = $stmt->fetch();

if ($row) {
    echo "La catégorie Poesie existe déjà.\n";
    exit;
}

$stmt = $pdo->prepare('INSERT INTO categories(nom, couleur, description) VALUES (?, ?, ?)');
$stmt->execute(['Poesie', '#0f766e', 'Collections de vers et poèmes pour respirer une littérature sensible et musicale.']);

echo "Catégorie Poesie ajoutée avec succès.\n";
