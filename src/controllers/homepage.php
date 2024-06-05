<?php
require_once('src/model/model.php');
function homepage() {
    $artworkRepository = new ArtworkRepository();
    $artworks = $artworkRepository->getArtworks();
    require('templates/homepage.php');
}
