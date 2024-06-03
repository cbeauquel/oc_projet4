<?php $title='The Artbox - échec suppression' ?>
    <? ob_start(); ?>
        <p class="msg"><strong>Oups !</strong> <br>une erreur est survenue lors de la suppression.<br>
        <a href="index.php">Retour</a></p>
    <?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>