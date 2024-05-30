<?php 
require ('templates/header.php'); 
require ('src/model.php'); 
?>
<form action="modification.php" method="POST">
    <input type="hidden" id="id" name="id" value="<?= $_POST['id'] ?>">
    <div class="champ-formulaire">
        <label for="titre">Titre de l'œuvre</label>
        <input type="text" name="titre" id="titre" value="<?= $_POST['title'] ?>">
    </div>
    <div class="champ-formulaire">
        <label for="artiste">Auteur de l'œuvre</label>
        <input type="text" name="artiste" id="artiste" value="<?= $_POST['author'] ?>">
    </div>
    <div class="champ-formulaire">
        <label for="image">URL de l'image</label>
        <input type="url" name="image" id="image" value="<?= $_POST['image'] ?>">
    </div>
    <div class="champ-formulaire">
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description"><?= $_POST['description'] ?></textarea>
    </div>

    <input id="modifier" type="submit" value="Valider" name="submit">
</form>

<?php require ('templates/footer.php';) ?>
