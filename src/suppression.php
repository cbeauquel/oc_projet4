<?php 
require ('model.php');
/* Requête de mofification d'une oeuvre*/

function delArtwork($delArtworkId) {
    $mysqlClient = dbConnexion();
    /*requête de suppression d'une oeuvre en BDD*/
    $delArtwork = $mysqlClient->prepare('DELETE FROM `artworks` WHERE id=:id');
    $delArtwork->execute([
    'id' => $delArtworkId,
    ]);

    return;
}