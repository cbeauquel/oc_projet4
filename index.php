<?php
    require ('src/model.php');

    $artworks = getArtworks();

    require ('templates/homepage.php');