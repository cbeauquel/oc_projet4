<?php 
function dbConnexion() {
    /*connexion à la base de donnée*/
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


function getArtworks() {
    $mysqlClient = dbConnexion();
    $artworksStatement = $mysqlClient->prepare('SELECT * FROM artworks ORDER BY id ASC');
    $artworksStatement->execute();
    $artworks = [];
    while ($row = $artworksStatement->fetch()) {
        $artwork = [
            'idArtwork' => $row['id'],
            'title' => $row['title'],
            'author' => $row['author'],
            'image' => $row['image'],
            'description' => $row['description'],         
        ];

        $artworks[] = $artwork;

    }

    return $artworks;
}

function getArtwork($idArtwork){

$artworks = getArtworks();
// On parcourt les oeuvres sorties de la requête SQL afin de rechercher celle qui a l'id précisé dans l'URL
foreach($artworks as $o){
    if ($o['idArtwork'] === $idArtwork ){
        $artwork = $o;
        break;
    }
}
    return $artwork;
}