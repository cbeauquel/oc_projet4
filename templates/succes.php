<?php $title = "The ArtBox"; ?>
<?php ob_start(); ?>
<p class="msg"><strong>Félicitation !</strong> <br>Votre oeuvre a été correctement ajoutée au site<br>
<a href="../artwork.php?id=<?=urlencode($IdArtworkAdded) ?>">Retour</a></p>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>