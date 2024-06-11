<?php
require_once('src/model/model.php');
function homepage() {
    $connexion = new DbConnexion();

    $artworkRepository = new \Application\model\artwork\ArtworkRepository();
    $artworkRepository->connexion = $connexion;
    $artworks = $artworkRepository->getArtworks();
    require('templates/homepage.php');
}
