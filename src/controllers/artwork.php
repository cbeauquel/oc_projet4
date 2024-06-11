<?php
require_once('src/model/model.php');
function artworkPage(string $idArtwork) 
    {
        $connexion = new DbConnexion();

        $artworkRepository = new \Application\model\artwork\ArtworkRepository();
        $artworkRepository->connexion = $connexion;
        $artwork = $artworkRepository->getArtwork($idArtwork);
        $description = str_replace("\"", "&quot", $artwork->description);
        require ('templates/artwork.php');
}


