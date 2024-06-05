<?php $title = "The ArtBox"; ?>
<?php ob_start(); ?>
    <p class="alert">Il faut une url d'image et un message valides pour ajouter votre oeuvre.</p>
    <p>Pour rappel, vous avez saisi les informations suivantes :</p>
    <ul>
        <li><?=$addArtwork['titre'];?></li>
        <li><?=$addArtwork['artiste'];?></li>
        <li><?=$addArtwork['image'];?></li>
        <li><?=$addArtwork['description'];?></li>
    </ul>
    <p class="alert"><a href="index.php?action=addartwork">Réessayer</a></p>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>