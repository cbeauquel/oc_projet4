<?php $title='The Artbox -' . $artwork->title; ?>
<? ob_start(); ?>
<article id="artwork-detail">
    <div id="artwork-img">
        <img src="<?= $artwork->image ?>" alt="<?= $artwork->title ?>">
    </div>
    <div id="artwork-content">
        <h1><?= $artwork->title ?></h1>
        <p class="description"><?= $artwork->author ?></p>
        <p class="description-complete">
             <?= $artwork->description ?>
        </p>
        <div class="boutons">
            <form action="index.php?action=updartwork" method="POST">
                    <input type="hidden" id="old" name="old" value="old">
                    <input type="hidden" id="id" name="id" value="<?= $artwork->id ?>">
                    <input type="hidden" id="title" name="title" value="<?= $artwork->title ?>">
                    <input type="hidden" id="author" name="author" value="<?= $artwork->author ?>">
                    <input type="hidden" id="description" name="description" value="<?= $description;?>">
                    <input type="hidden" id="image" name="image" value="<?= $artwork->image ?>">
                    <input id="modifier" type="submit" value="Modifier l'œuvre" name="submit">
            </form>
            <form action="index.php?action=delartwork" method="POST">
                    <input type="hidden" id="id" name="id" value="<?= $artwork->id ?>">
                    <input id="supprimer" type="submit" value="Supprimer l'œuvre" name="submit">
            </form>
        </div>
    </div>
</article>
<?php $content = ob_get_clean();?>
<?php require('layout.php');