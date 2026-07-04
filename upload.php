<?php

function upload_image($file)
{

    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

    $nouveauNom = uniqid() . "." . $extension;

    $dossier = __DIR__ . '/../public/assets/uploads/';

    if (!is_dir($dossier)) {

        mkdir($dossier, 0777, true);

    }

    move_uploaded_file(

        $file['tmp_name'],

        $dossier . $nouveauNom

    );

    return $nouveauNom;

}