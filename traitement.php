<?php
require 'header.php';
require 'bdd.php';

$addOeuvre = $_POST;
/* Contrôle des données de formulaire*/
if (
    !isset($addOeuvre['titre'])
    || !filter_var($addOeuvre['image'], FILTER_VALIDATE_URL)
    || empty($addOeuvre['description'])
    || trim($addOeuvre['description']) === ''
    || strlen($addOeuvre['description']) < 3
)  {
    echo '<p class="alert">Il faut une url d\'image et un message valides pour ajouter votre oeuvre.<br>
    <a href="index.php">Retour</a></p>';
}
else {
/*requête d'ajout d'une oeuvre en BDD*/
    $title = strip_tags($addOeuvre['titre']);
    $author = strip_tags($addOeuvre['artiste']);
    $description = strip_tags($addOeuvre['description']);
    $image = $addOeuvre['image'];

$oeuvreAdd = $mysqlClient->prepare('INSERT INTO `oeuvres` (`id`, `title`, `description`, `author`, `image`) VALUES (NULL, :title, :description, :author, :image)');
$oeuvreAdd->execute([
    'title' => $title,
    'description' => $description,
    'author' => $author,
    'image' => $image,
    ]);
echo '<p class="msg"><strong>Félicitation !</strong> <br>Votre oeuvre a été correctement ajoutée au site<br>
      <a href="oeuvre.php?id=' . $mysqlClient->lastInsertId() . '">Retour</a></p>';
}


require 'footer.php'; ?>
