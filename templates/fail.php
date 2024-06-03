<?php $title = "The ArtBox"; ?>
<?php ob_start(); ?>
    <p class="alert">Il faut une url d'image et un message valides pour ajouter votre oeuvre.<br>
    <p>Pour rappel, vous avez saisi les informations suivantes : 
        <?=$addArtwork['titre'] ."<br>";?>
        <?=$addArtwork['artiste'] ."<br>";?>
        <?=$addArtwork['image'] ."<br>";?>
    <a href="../ajouter.php">Réessayer</a></p>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>