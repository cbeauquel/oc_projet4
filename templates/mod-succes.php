<?php $title = "The ArtBox"; ?>
<?php ob_start(); ?>
<p class="msg"><strong>Félicitation !</strong> <br>Votre oeuvre a été correctement modifiée<br>
<a href="../artwork.php?id=<?=urlencode($updArtwork['id']) ?>">Retour</a></p>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>