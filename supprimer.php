<?php 
require ('templates/header.php'); 
require ('src/model.php'); 

?>
<p class="alert">Attention, cette action est définitive !</p>
<form action="suppression.php" method="POST">
    <input type="hidden" id="id" name="id" value="<?= $_POST['id'] ?>">
    <input id="supprimer" type="submit" value="Supprimer définitivement" name="submit">
</form>

<?php require ('templates/footer.php';) ?>
