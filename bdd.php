<?php 
/*connexion à la base de donnée*/
try {
$mysqlClient=new PDO(
    'mysql:host=localhost;dbname=artbox',
    'root',
    '',
    /*activation des messages d'erreur sur les requêtes SQL*/
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);
}
/*on vérifie s'il y a des erreurs*/
catch (Exception $e) {
    die('Erreur : '. $e->getMessage());
}
/*requête de récupération des oeuvres*/
$oeuvresStatement = $mysqlClient->prepare('SELECT * FROM oeuvres ORDER BY id ASC');
$oeuvresStatement->execute();
$oeuvres = $oeuvresStatement->fetchAll();


/*requête de récupération d'une oeuvre avec un ID en GET*/
// Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $oeuvreStatement = $mysqlClient->prepare('SELECT * FROM oeuvres WHERE id=:id');
    $oeuvreStatement->execute([
        'id' => $id,]);
    $row = $oeuvreStatement->fetch();
    if ($row){
        $oeuvre['id'] = $row['id'];
        $oeuvre['title'] = $row['title'];
        $oeuvre['author'] = $row['author'];
        $oeuvre['image'] = $row['image'];
        $oeuvre['description'] = $row['description'];
    }
}
?>