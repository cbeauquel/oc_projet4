<?php
    require 'header.php';
    require 'bdd.php';
    // Si l'URL ne contient pas d'id ou aucune oeuvre trouvée, on redirige sur la page d'accueil
    if(empty($_GET['id']) && is_null($oeuvre)) {
        header('Location: index.php');
    }

?>
<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['title'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['title'] ?></h1>
        <p class="description"><?= $oeuvre['author'] ?></p>
        <p class="description-complete">
             <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>
<?php require 'footer.php'; ?>
