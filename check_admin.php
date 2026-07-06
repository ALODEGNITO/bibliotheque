<?php
require_once __DIR__ . '/app/db.php';
$pdo = require __DIR__ . '/app/db.php';
$stmt = $pdo->query('SELECT id, nom, prenom, email, role FROM lecteurs');
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($users as $user) {
    echo implode(' | ', $user) . "\n";
}
