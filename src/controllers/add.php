<?php

require_once('src/model/model.php');
    /* Contrôle des données de formulaire*/
function addArtworkPage($addArtwork){
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
        $connexion = new DbConnexion();

        $repository = new \Application\model\artwork\ArtworkRepository();
        $repository->connexion=$connexion;
        $IdArtworkAdded = $repository->addArtwork($addArtwork);
        require('templates/succes.php');
    }
}