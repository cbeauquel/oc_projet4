<?php 
require ('templates/header.php');
require ('src/model.php');
/* Requête de mofification d'une oeuvre*/

$supartwork = $_POST;
echo $supartwork['id'];
/* Contrôle des données de formulaire*/
if (
    !isset($supartwork['id'])
)  {
    echo '<p class="alert">Une information erronée bloque la suppression<br>
    <a href="oeuvre.php?id=' . $supartwork['id'] . '">Retour</a></p>';
}
else {
/*requête de suppression d'une oeuvre en BDD*/
    $id = $supartwork['id'];

$artworksup = $mysqlClient->prepare('DELETE FROM `artworks` WHERE id=:id');
$artworksup->execute([
    'id' => $id,
    ]);
echo '<p class="msg">Votre oeuvre a été correctement modifiée<br>
      <a href="index.php">Retour</a></p>';
}
require ('templates/footer.php');
