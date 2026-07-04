<?php
$config = require 'c:/laragon-new/www/bibliotheque/app/config.php';
$db = $config['db'];
$dsn = 'mysql:host=' . $db['host'] . ';dbname=' . $db['name'];
$pdo = new PDO($dsn, $db['user'], $db['pass']);
foreach ($pdo->query('DESCRIBE livres') as $row) {
    echo $row['Field'] . "\t" . $row['Type'] . "\n";
}
