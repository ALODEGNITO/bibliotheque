<?php
$config = require __DIR__ . '/app/config.php';
$db = $config['db'];
$dsn = 'mysql:host=' . $db['host'] . ';dbname=' . $db['name'];
try {
    $pdo = new PDO($dsn, $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $columns = $pdo->query("SHOW COLUMNS FROM livres")->fetchAll(PDO::FETCH_COLUMN);

    $toAdd = [];
    if (!in_array('description', $columns)) {
        $toAdd[] = "ADD COLUMN description TEXT NOT NULL";
    }
    if (!in_array('maison_edition', $columns)) {
        $toAdd[] = "ADD COLUMN maison_edition VARCHAR(100) NOT NULL DEFAULT ''";
    }
    if (!in_array('nombre_exemplaire', $columns)) {
        $toAdd[] = "ADD COLUMN nombre_exemplaire INT NOT NULL DEFAULT 1";
    }

    if (!empty($toAdd)) {
        $pdo->exec('ALTER TABLE livres ' . implode(', ', $toAdd));
        echo "Colonnes ajoutées : " . implode(', ', array_map(function($sql) {
            return preg_replace('/^ADD COLUMN /', '', $sql);
        }, $toAdd)) . "\n";
    } else {
        echo "Aucune colonne manquante.\n";
    }

    $tableExists = $pdo->query("SHOW TABLES LIKE 'liste_lecture'")->fetchColumn();
    if (!$tableExists) {
        $pdo->exec(
            "CREATE TABLE liste_lecture(
                id INT AUTO_INCREMENT PRIMARY KEY,
                id_livre INT NOT NULL,
                id_lecteur INT NOT NULL,
                date_emprunt DATE DEFAULT NULL,
                date_retour DATE DEFAULT NULL,
                UNIQUE KEY unique_liste_lecture (id_livre, id_lecteur),
                FOREIGN KEY (id_livre) REFERENCES livres(id) ON DELETE CASCADE,
                FOREIGN KEY (id_lecteur) REFERENCES lecteurs(id) ON DELETE CASCADE
            )"
        );
        echo "Table liste_lecture créée.\n";
    } else {
        echo "Table liste_lecture existe déjà.\n";
    }
} catch (PDOException $e) {
    echo 'Erreur SQL: ' . $e->getMessage() . "\n";
}
