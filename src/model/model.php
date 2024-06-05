<?php 
/*Création d'un objet oeuvre*/
class Artwork
{
    public int $id;
    public string $author;
    public string $title;
    public string $image;
    public string $description;
}

class ArtworkRepository
{
    /* connexion à la base de donnée */
    //public ?PDO $mysqlCLient = null;
    private ?PDO $mysqlClient = null;

    /*Extraction de la liste des oeuvres*/
    public function getArtworks(): array 
    {
        $this->dbConnexion();
        $artworksStatement = $this->mysqlClient->prepare('SELECT * FROM artworks ORDER BY id ASC');
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
    public function getArtwork(int $idArtwork): ?Artwork{
        $this->dbConnexion();
        $artworkStatement = $this->mysqlClient->prepare('SELECT * FROM artworks WHERE id = :id');
        $artworkStatement->execute([
            'id' => $idArtwork,
        ]);
        $row = $artworkStatement->fetch();
        if ($row) {
            $artwork = new Artwork();
            $artwork->id = $row['id'];
            $artwork->title = $row['title'];
            $artwork->author = $row['author'];
            $artwork->image = $row['image'];
            $artwork->description = $row['description'];
        return $artwork;
        }
        return 'prout';
    }

    public function dbConnexion() 
    {
        if ($this->mysqlClient === null) 
        {
            try {
                $this->mysqlClient = new PDO(
                'mysql:host=localhost;dbname=artbox',
                'root',
                '',
                /*activation des messages d'erreur sur les requêtes SQL*/
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
            );
            } catch (Exception $e) {
                die('Erreur : '. $e->getMessage());
            }
        }
    }

    /*Ajout d'une oeuvre*/
    function addArtwork($addArtwork): array{
        $this->dbConnexion();
        try{
            $artworkAdd = $this->mysqlClient->prepare('INSERT INTO `artworks` (`id`, `title`, `description`, `author`, `image`) VALUES (NULL, :title, :description, :author, :image)');
            $artworkAdd->execute([
                'title' => $addArtwork['titre'],
                'description' => $addArtwork['description'],
                'author' => $addArtwork['artiste'],
                'image' => $addArtwork['image'],
                ]);
        $IdArtworkAdded = $this->mysqlClient-->LastInsertId();
        echo "Dernier id inséré : " . $IdArtworkAdded;
        
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
        return $IdArtworkAdded;
    } 

    /* Modifification d'une oeuvre*/
    function artworkUpdate($updArtwork) {   
        $title = strip_tags($updArtwork['title']);
        $author = strip_tags($updArtwork['author']);
        $description = strip_tags($updArtwork['description']);
        $image = $updArtwork['image'];
        $updId = $updArtwork['id'];
        $this->dbConnexion();
        $artworkUpd = $this->mysqlClient->prepare('UPDATE `artworks` SET title = :title, description = :description, author = :author, image = :image WHERE id=:id');
        $artworkUpd->execute([
            'title' => $title,
            'description' => $description,
            'author' => $author,
            'image' => $image,
            'id' => $updId,
            ]);
        }


        /*Suppression d'une oeuvre en BDD*/
        function delArtwork($delArtworkId): int {
            $this->dbConnexion();
            $delArtwork = $this->mysqlClient->prepare('DELETE FROM `artworks` WHERE id=:id');
            $delArtwork->execute([
            'id' => $delArtworkId,
            ]);

    }

}



