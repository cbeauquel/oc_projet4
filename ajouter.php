<?php
    require('src/traitement.php');
    $addArtwork = $_POST;
    /* Contrôle des données de formulaire*/
    if (empty($addArtwork)) {
        require('templates/ajouter.php');
    } elseif (
            !isset($addArtwork['titre'])
            || !filter_var($addArtwork['image'], FILTER_VALIDATE_URL)
            || empty($addArtwork['artiste'])
            || empty($addArtwork['description'])
            || trim($addArtwork['description']) === ''
            || strlen($addArtwork['description']) < 3
    )  {
    require('templates/fail.php');
    } else {
        /*requête d'ajout d'une oeuvre en BDD*/
        $IdArtworkAdded = addArtwork($addArtwork);
        require('templates/succes.php');
    }
