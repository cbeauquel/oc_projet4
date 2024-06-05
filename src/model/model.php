<?php 
/*Création d'un objet oeuvre*/
class Artwork
{
    public string $id;
    public string $author;
    public string $title;
    public string $image;
    public string $description;
}

/*connexion à la base de donnée*/
 /*Extraction de la liste des oeuvres*/
function getArtworks(): array {
    $mysqlClient = dbConnexion();
    $artworksStatement = $mysqlClient->prepare('SELECT * FROM artworks ORDER BY id ASC');
    $artworksStatement->execute();
    $artworks = [];
    while ($row = $artworksStatement->fetch()) {
        $artwork = new Artwork();
        $artwork->id = $row['id'];
        $artwork->title = $row['title'];
        $artwork->author = $row['author'];
        $artwork->image = $row['image'];
        $artwork->description = $row['description'];

        $artworks[] = $artwork;
    }
    return $artworks;
}

/*Extraction d'une oeuvre*/
function getArtwork($idArtwork){
$artworks = getArtworks();
// On parcourt les oeuvres sorties de la requête SQL afin de rechercher celle qui a l'id précisé dans l'URL
foreach($artworks as $artwork){
    if ($artwork->id === $idArtwork ){
        $artwork = $artwork;
        break;
    }
}
    return $artwork;
}

/*Ajout d'une oeuvre*/
function addArtwork($addArtwork){
        $mysqlClient = dbConnexion();
        try{
            $artworkAdd = $mysqlClient->prepare('INSERT INTO `artworks` (`id`, `title`, `description`, `author`, `image`) VALUES (NULL, :title, :description, :author, :image)');
            $artworkAdd->execute([
                'title' => $addArtwork['titre'],
                'description' => $addArtwork['description'],
                'author' => $addArtwork['artiste'],
                'image' => $addArtwork['image'],
                ]);
        $IdArtworkAdded = $mysqlClient->LastInsertId();
        echo "Dernier id inséré : " . $IdArtworkAdded;
        
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
        return $IdArtworkAdded;
    } 

/* Modifification d'une oeuvre*/
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


/*Suppression d'une oeuvre en BDD*/
function delArtwork($delArtworkId) {
    $mysqlClient = dbConnexion();
    $delArtwork = $mysqlClient->prepare('DELETE FROM `artworks` WHERE id=:id');
    $delArtwork->execute([
    'id' => $delArtworkId,
    ]);

    return;
}

function dbConnexion() {
    try {
        $mysqlClient=new PDO(
        'mysql:host=localhost;dbname=artbox',
        'root',
        '',
        /*activation des messages d'erreur sur les requêtes SQL*/
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    } catch (Exception $e) {
        die('Erreur : '. $e->getMessage());
    }

    return $mysqlClient;
}
