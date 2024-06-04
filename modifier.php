<?php
    $updArtwork = $_POST;
    /* Contrôle des données de formulaire*/
    if (isset($updArtwork['old'])) {
        require('templates/modifier.php');
    } elseif (
        empty($updArtwork['title'])
        || !filter_var($updArtwork['image'], FILTER_VALIDATE_URL)
        || empty($updArtwork['author'])
        || empty($updArtwork['description'])
        || trim($updArtwork['description']) === ''
        || strlen($updArtwork['description']) < 3
    )  {
        require('templates/mod-fail.php');
    }
    else {
    /*requête de modification d'une oeuvre en BDD*/
        require ('src/model.php');
        artworkUpdate($updArtwork);
        require('templates/mod-succes.php');
    }