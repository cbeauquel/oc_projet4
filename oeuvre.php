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
    $description = str_replace("\"", "&quot", $oeuvre['description']);

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
        <form action="modifier.php" method="POST">
            <input type="hidden" id="id" name="id" value="<?php echo $oeuvre['id'];?>">
            <input type="hidden" id="title" name="title" value="<?php echo $oeuvre['title'];?>">
            <input type="hidden" id="author" name="author" value="<?php echo $oeuvre['author'];?>">
            <input type="hidden" id="description" name="description" value="<?php echo $description;?>">
            <input type="hidden" id="image" name="image" value="<?php echo $oeuvre['image'];?>">
            <button type="submit">Modifier l'œuvre</button>
        </form>
        <button>Supprimer</button>
    </div>
</article>
<?php require 'footer.php'; ?>
