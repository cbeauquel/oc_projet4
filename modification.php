<?php 
require 'header.php';
require 'bdd.php';
/* Requête de mofification d'une oeuvre*/

$updOeuvre = $_POST;
/* Contrôle des données de formulaire*/
if (
    !isset($updOeuvre['titre'])
    || !filter_var($updOeuvre['image'], FILTER_VALIDATE_URL)
    || empty($updOeuvre['description'])
    || trim($updOeuvre['description']) === ''
    || strlen($updOeuvre['description']) < 3
)  {
    echo '<p class="alert">Il faut une url d\'image et un message valides pour modifier l\'oeuvre.<br>
    <a href="index.php">Retour</a></p>';
}
else {
/*requête de modification d'une oeuvre en BDD*/
    $title = strip_tags($updOeuvre['titre']);
    $author = strip_tags($updOeuvre['artiste']);
    $description = strip_tags($updOeuvre['description']);
    $image = $updOeuvre['image'];
    $id = $updOeuvre['id'];

$oeuvreUpd = $mysqlClient->prepare('UPDATE `oeuvres` SET title = :title, description = :description, author = :author, image = :image WHERE id=:id');
$oeuvreUpd->execute([
    'title' => $title,
    'description' => $description,
    'author' => $author,
    'image' => $image,
    'id' => $id,
    ]);
echo '<p class="msg">Votre oeuvre a été correctement modifiée<br>
      <a href="oeuvre.php?id=' . $updOeuvre['id'] . '">Retour</a></p>';
}
?>