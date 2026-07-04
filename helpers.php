<?php

// Échapper les caractères spéciaux (protection XSS)
function e($value)
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

// Démarrer une session
function start_session()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

// Retourne l'identifiant de l'utilisateur connecté
function current_user_id()
{
    start_session();

    return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
}

function current_user_role()
{
    start_session();

    return isset($_SESSION['role']) ? $_SESSION['role'] : 'user';
}

function category_badge_class($categorie)
{
    $normalized = strtolower(trim($categorie));
    $normalized = preg_replace('/[^a-z0-9]+/', '-', $normalized);
    $normalized = trim($normalized, '-');

    return 'badge badge-cat-' . ($normalized === '' ? 'default' : $normalized);
}

// Message Flash
function set_flash($type, $message)
{
    start_session();

    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message
    ];
}

// Lire le message Flash
function get_flash()
{
    start_session();

    if (!isset($_SESSION['flash'])) {
        return null;
    }

    $flash = $_SESSION['flash'];

    unset($_SESSION['flash']);

    return $flash;
}