<?php $title = "The ArtBox"; ?>
<?php ob_start(); ?>
    <p class="alert">Il faut une url d'image et un message valides pour modifier votre oeuvre.</p>
    <p>Pour rappel, vous avez saisi les informations suivantes : 
        <ul>
            <li><?=$updArtwork['title'];?></li>
            <li><?=$updArtwork['author'];?></li>
            <li><?=$updArtwork['image'];?></li>
            <li><?=$updArtwork['description'];?></li>
        </ul>
    <p class="alert"><a href="index.php?artwork&id=<?=urlencode($updArtwork['id'])?>">Réessayer</a></p>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>