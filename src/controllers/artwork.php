<?php
require_once('src/model/model.php');
function artworkPage(string $idArtwork) 
    {
        $artwork = getArtwork($idArtwork);
        $description = str_replace("\"", "&quot", $artwork->description);
        require ('templates/artwork.php');
}


