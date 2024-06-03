<?php 
require ('model.php');
/* Requête de mofification d'une oeuvre*/
function artworkUpdate($updArtwork){   
    $title = strip_tags($updArtwork['title']);
    $author = strip_tags($updArtwork['author']);
    $description = strip_tags($updArtwork['description']);
    $image = $updArtwork['image'];
    $updId = $updArtwork['id'];
    $mysqlClient = dbConnexion();
    $artworkUpd = $mysqlClient->prepare('UPDATE `artworks` SET title = :title, description = :description, author = :author, image = :image WHERE id=:id');
    $artworkUpd->execute([
        'title' => $title,
        'description' => $description,
        'author' => $author,
        'image' => $image,
        'id' => $updId,
        ]);
}


