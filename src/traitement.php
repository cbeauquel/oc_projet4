<?php
require ('model.php');
function addArtwork(){
    $mysqlClient = dbConnexion();
    $addartwork = $_POST;
    /* Contrôle des données de formulaire*/
    if (!empty($addartwork)) {
       if (
            !isset($addartwork['titre'])
            || !filter_var($addartwork['image'], FILTER_VALIDATE_URL)
            || empty($addartwork['artiste'])
            || empty($addartwork['description'])
            || trim($addartwork['description']) === ''
            || strlen($addartwork['description']) < 3
        )  {
            // header('Location: templates/fail.php');
            echo $addartwork['titre'] ."<br>";
            echo $addartwork['author'] ."<br>";
            echo $addartwork['image'] ."<br>";

        }
        else {
        /*requête d'ajout d'une oeuvre en BDD*/
            $title = strip_tags($addartwork['titre']);
            $author = strip_tags($addartwork['artiste']);
            $description = strip_tags($addartwork['description']);
            $image = $addartwork['image'];
    
        $artworkAdd = $mysqlClient->prepare('INSERT INTO `artworks` (`id`, `title`, `description`, `author`, `image`) VALUES (NULL, :title, :description, :author, :image)');
        $artworkAdd->execute([
            'title' => $title,
            'description' => $description,
            'author' => $author,
            'image' => $image,
            ]);
           header('Location: templates/succes.php');
        } 
        $lastArtworkAdded = $mysqlClient->lastInsertId();
    }
    else {echo $lastArtworkAdded;}
    return;
}
