<?php

    /* Contrôle des données de formulaire*/
function artworkUpdatePage(){
    $updArtwork = $_POST;
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
        require_once('src/model/model.php');
        $connexion = new DbConnexion();

        $repository = new \Application\model\artwork\ArtworkRepository();
        $repository->connexion = $connexion;
        $repository->artworkUpdate($updArtwork);
        require('templates/mod-succes.php');
    }
}