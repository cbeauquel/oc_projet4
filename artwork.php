<?php
    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
    require ('src/model.php');
    if(isset($_GET['id']) && $_GET['id'] > 0) {
        $idArtwork = $_GET['id'];
    }   
    else {   
        header('Location: index.php');

        die;
    }

    $artwork = getArtwork ($idArtwork);
    $description = str_replace("\"", "&quot", $artwork['description']);

    // Si aucune oeuvre trouvé, on redirige vers la page d'accueil
    if(is_null($artwork)) {
        header('Location: index.php');
    }
require ('templates/artwork.php');


