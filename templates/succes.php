<?php 
require('../src/traitement.php');
echo $idArtworkAdded;
?>
<p class="msg"><strong>Félicitation !</strong> <br>Votre oeuvre a été correctement ajoutée au site<br>
<a href="../artwork.php?id=<?php echo $idArtworkAdded; ?>">Retour</a></p>
