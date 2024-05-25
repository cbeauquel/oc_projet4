<?php 
require 'header.php'; 
require 'bdd.php'; 

?>
<form action="suppression.php" method="POST">
    <input type="hidden" id="id" name="id" value="<?php echo $_POST['id'];?>">
    <input type="submit" value="Valider" name="submit">
</form>

<?php require 'footer.php'; ?>