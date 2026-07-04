<?php

require_once __DIR__ . '/helpers.php';

// Vérifie que l'utilisateur est connecté
function require_auth()
{
    start_session();

    if (!isset($_SESSION['user_id'])) {

        set_flash('error', 'Veuillez vous connecter.');

        header('Location: login.php');

        exit;
    }
}

function require_admin()
{
    require_auth();

    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        set_flash('error', 'Accès refusé. Vous devez être administrateur.');
        header('Location: index.php');
        exit;
    }
}
