<?php
$config = require __DIR__ . '/app/config.php';
$db = $config['db'];
$mysqli = new mysqli($db['host'], $db['user'], $db['pass'], $db['name']);
if ($mysqli->connect_error) {
    die('Connect error: ' . $mysqli->connect_error);
}
$result = $mysqli->query('SELECT id, nom, prenom, email, role FROM lecteurs');
if (!$result) {
    die('Query error: ' . $mysqli->error);
}
while ($row = $result->fetch_assoc()) {
    echo implode(' | ', $row) . "\n";
}
$mysqli->close();
