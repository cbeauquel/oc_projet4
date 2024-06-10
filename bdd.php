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
?>