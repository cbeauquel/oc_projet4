<?php
require ('model.php');
function addArtwork($addArtwork){
        $title = strip_tags($addArtwork['titre']);
        $author = strip_tags($addArtwork['artiste']);
        $description = strip_tags($addArtwork['description']);
        $image = $addArtwork['image'];
        
        $mysqlClient = dbConnexion();
        try{
            $artworkAdd = $mysqlClient->prepare('INSERT INTO `artworks` (`id`, `title`, `description`, `author`, `image`) VALUES (NULL, :title, :description, :author, :image)');
            $artworkAdd->execute([
                'title' => $title,
                'description' => $description,
                'author' => $author,
                'image' => $image,
                ]);
        $IdArtworkAdded = $mysqlClient->LastInsertId();
        echo "Dernier id inséré : " . $IdArtworkAdded;
        
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
        return $IdArtworkAdded;
    } 
