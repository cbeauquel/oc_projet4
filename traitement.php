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
)  {
    echo '<p class="alert">Il faut une url d\'image et un message valides pour ajouter votre oeuvre.<br>
    <a href="index.php">Retour</a></p>
    ';

    require 'footer.php';
    return;
}
    $title = $addOeuvre['titre'];
    $author = $addOeuvre['artiste'];
    $description = $addOeuvre['description'];
    $image = $addOeuvre['image'];
?>
<p class="msg"><strong>Félicitation !</strong> <br>Votre oeuvre a été correctement ajoutée au site<br>
<a href="index.php">Retour</a></p>
<?php require 'footer.php'; ?>

<?php
/*requête d'ajout d'une oeuvre en BDD*/
$oeuvreAdd = $mysqlClient->prepare('INSERT INTO `oeuvres` (`id`, `title`, `description`, `author`, `image`) VALUES (NULL, :title, :description, :author, :image)');
$oeuvreAdd->execute([
    'title' => $title,
    'description' => $description,
    'author' => $author,
    'image' => $image,
]);

?>