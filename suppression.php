<?php 
require 'header.php';
require 'bdd.php';
/* Requête de mofification d'une oeuvre*/

$supOeuvre = $_POST;
echo $supOeuvre['id'];
/* Contrôle des données de formulaire*/
if (
    !isset($supOeuvre['id'])
)  {
    echo '<p class="alert">Une information erronée bloque la suppression<br>
    <a href="oeuvre.php?id=' . $supOeuvre['id'] . '">Retour</a></p>';
}
else {
/*requête de suppression d'une oeuvre en BDD*/
    $id = $supOeuvre['id'];

$oeuvresup = $mysqlClient->prepare('DELETE FROM `oeuvres` WHERE id=:id');
$oeuvresup->execute([
    'id' => $id,
    ]);
echo '<p class="msg">Votre oeuvre a été correctement modifiée<br>
      <a href="index.php">Retour</a></p>';
}
?>