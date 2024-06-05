<?php
require_once('src/model/model.php');
function homepage() {
    $artworks = getArtworks();

    require('templates/homepage.php');
}
