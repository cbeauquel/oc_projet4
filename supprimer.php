<?php 
require 'header.php'; 
require 'bdd.php'; 

?>
<p class="alert">Attention, cette action est définitive !</p>
<form action="suppression.php" method="POST">
    <input type="hidden" id="id" name="id" value="<?php echo $_POST['id'];?>">
    <input id="supprimer" type="submit" value="Supprimer définitivement" name="submit">
</form>

<?php require 'footer.php'; ?>