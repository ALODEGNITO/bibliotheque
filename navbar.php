<?php

require_once __DIR__ . '/helpers.php';

function render_navbar()
{
    start_session();

    $userId = current_user_id();
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
    ?>
    <nav class="app-navbar">
        <div class="navbar-inner">
            <div class="navbar-brand">
                <a href="index.php">Bibliothèque</a>
            </div>

            <div class="navbar-links">
                <?php if ($userId): ?>
                    <a href="index.php">Accueil</a>
                    <a href="categories.php">Catégories</a>
                    <a href="wishlist.php">Ma liste</a>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <a href="admin.php">Admin</a>
                    <?php endif; ?>
                    <a href="logout.php">Déconnexion</a>
                <?php else: ?>
                    <a href="login.php">Connexion</a>
                    <a href="register.php">Inscription</a>
                <?php endif; ?>
            </div>

            <?php if ($email): ?>
                <div class="navbar-user">Connecté : <strong><?= e($email) ?></strong></div>
            <?php endif; ?>
        </div>
    </nav>
    <?php
}
