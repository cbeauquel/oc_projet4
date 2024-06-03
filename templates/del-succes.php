<?php $title='The Artbox - suppression' ?>
    <? ob_start(); ?>
        <p class="msg"><strong>Félicitation !</strong> <br>Votre oeuvre a été correctement supprimée du site<br>
        <a href="index.php">Retour</a></p>
    <?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>