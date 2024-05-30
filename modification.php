<?php 
require ('templates/header.php');
require ('src/model.php');
/* Requête de mofification d'une oeuvre*/

$updartwork = $_POST;
/* Contrôle des données de formulaire*/
if (
    !isset($updartwork['titre'])
    || !filter_var($updartwork['image'], FILTER_VALIDATE_URL)
    || empty($updartwork['description'])
    || trim($updartwork['description']) === ''
    || strlen($updartwork['description']) < 3
)  {
    echo '<p class="alert">Il faut une url d\'image et un message valides pour modifier l\'oeuvre.<br>
    <a href="index.php">Retour</a></p>';
}
else {
/*requête de modification d'une oeuvre en BDD*/
    $title = strip_tags($updartwork['titre']);
    $author = strip_tags($updartwork['artiste']);
    $description = strip_tags($updartwork['description']);
    $image = $updartwork['image'];
    $id = $updartwork['id'];

$artworkUpd = $mysqlClient->prepare('UPDATE `artworks` SET title = :title, description = :description, author = :author, image = :image WHERE id=:id');
$artworkUpd->execute([
    'title' => $title,
    'description' => $description,
    'author' => $author,
    'image' => $image,
    'id' => $id,
    ]);
echo '<p class="msg">Votre oeuvre a été correctement modifiée<br>
      <a href="artwork.php?id=' . $updartwork['id'] . '">Retour</a></p>';
}
require ('templates/footer.php');