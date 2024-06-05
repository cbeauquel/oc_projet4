<?php
require_once('src/model/model.php');
function artworkPage(string $idArtwork) 
    {
        $artworkRepository = new ArtworkRepository();
        $artwork = $artworkRepository->getArtwork($idArtwork);
        $description = str_replace("\"", "&quot", $artwork->description);
        require ('templates/artwork.php');
}


