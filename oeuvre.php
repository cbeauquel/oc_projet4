<?php
    require 'header.php';
    require 'bdd.php';
    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
    if(empty($_GET['id'])) {
        header('Location: index.php');
    }
  
    // On parcourt les oeuvres sorties de la requête SQL afin de rechercher celle qui a l'id précisé dans l'URL
      foreach($oeuvres as $o){
        if ($o['id'] === $_GET['id']){
            $oeuvre = $o;
            break;
        }
    }
    // Si aucune oeuvre trouvé, on redirige vers la page d'accueil
    if(is_null($oeuvre)) {
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
