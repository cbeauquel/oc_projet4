<?php $title = "The ArtBox - supprimer une oeuvre"; ?>
<?php ob_start(); ?>
    <p class="alert">Attention, cette action est définitive !</p>
    <form action="index.php?action=delartwork" method="POST">
        <input type="hidden" id="id" name="id" value="<?= $_POST['id'] ?>">
        <input type="hidden" id="go" name="go" value="go">
        <input id="supprimer" type="submit" value="Supprimer définitivement" name="submit">
    </form>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>
