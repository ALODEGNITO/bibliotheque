<?php

function validate_livre($data, $file)
{
    $errors = [];

    $titre = trim(isset($data['titre']) ? $data['titre'] : '');
    $auteur = trim(isset($data['auteur']) ? $data['auteur'] : '');
    $description = trim(isset($data['description']) ? $data['description'] : '');
    $maison_edition = trim(isset($data['maison_edition']) ? $data['maison_edition'] : '');
    $annee = trim(isset($data['annee_publication']) ? $data['annee_publication'] : '');
    $categorie = trim(isset($data['categorie']) ? $data['categorie'] : '');
    $nombre_exemplaire = trim(isset($data['nombre_exemplaire']) ? $data['nombre_exemplaire'] : '');

    if ($titre === '' || strlen($titre) < 3) {
        $errors['titre'] = "Titre invalide.";
    }

    if ($auteur === '' || strlen($auteur) < 3) {
        $errors['auteur'] = "Auteur invalide.";
    }

    if ($description === '' || strlen($description) < 10) {
        $errors['description'] = "Description invalide (au moins 10 caractères).";
    }

    if ($maison_edition === '' || strlen($maison_edition) < 2) {
        $errors['maison_edition'] = "Maison d'édition invalide.";
    }

    if (!is_numeric($annee) || (int)$annee < 0) {
        $errors['annee_publication'] = "Année invalide.";
    }

    if ($categorie === '') {
        $errors['categorie'] = "Choisissez une catégorie.";
    }

    if ($nombre_exemplaire === '' || !is_numeric($nombre_exemplaire) || (int)$nombre_exemplaire < 1) {
        $errors['nombre_exemplaire'] = "Nombre d'exemplaires invalide.";
    }

    if (
        $file &&
        (isset($file['error']) ? $file['error'] : UPLOAD_ERR_NO_FILE) != UPLOAD_ERR_NO_FILE
    ) {

        if ($file['error'] != UPLOAD_ERR_OK) {

            $errors['image'] = "Erreur d'upload.";

        } else {

            $mime = mime_content_type($file['tmp_name']);

            $autorises = [

                'image/jpeg',
                'image/png',
                'image/webp'

            ];

            if (!in_array($mime, $autorises)) {

                $errors['image'] = "Format non autorisé.";

            }

            if ($file['size'] > 2 * 1024 * 1024) {

                $errors['image'] = "Image supérieure à 2 Mo.";

            }

        }

    }

    return [

        $errors,

        [

            'titre' => $titre,
            'auteur' => $auteur,
            'description' => $description,
            'maison_edition' => $maison_edition,
            'annee_publication' => $annee,
            'categorie' => $categorie,
            'nombre_exemplaire' => $nombre_exemplaire

        ]

    ];
}