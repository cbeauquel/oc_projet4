<?php
require_once('src/controllers/homepage.php');
require_once('src/controllers/artwork.php');
require_once('src/controllers/add.php');
require_once('src/controllers/delete.php');
require_once('src/controllers/update.php');

if (isset($_GET['action']) && $_GET['action'] !== '') {    
    if ($_GET['action'] === 'artwork') {
        if(isset($_GET['id']) && $_GET['id'] > 0) {
            $idArtwork = $_GET['id'];

            artworkPage($idArtwork);
        } else {   
            echo 'Erreur : aucun identifiant de billet envoyé';

        	die;
        }
    } elseif ($_GET['action'] === 'updartwork') {
        artworkUpdatePage();
    } elseif ($_GET['action'] === 'delartwork') {
        $delArtworkId = $_POST['id'];
        delArtworkPage($delArtworkId);
    } elseif ($_GET['action'] === 'addartwork') {
        $addArtwork = $_POST;
        addArtworkPage($addArtwork);
    } else {
        echo "erreur 404 : la page que vous recherchez n'existe pas.";
    }
} else {
    homepage();
}

