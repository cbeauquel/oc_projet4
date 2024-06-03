<?php 
require ('src/suppression.php');
$delArtworkId = $_POST['id'];
if (isset($_POST['go'])) {
     $delArtworkGo = $_POST['go'];
}
else {
    $delArtworkGo = null;
}

if (isset($delArtworkGo) && isset($delArtworkId)){
     delArtwork($delArtworkId);
     require ('templates/del-succes.php');
 }
elseif (!isset($delArtworkId)){
    require ('templates/del-fail.php');
} 
else {
    require ('templates/supprimer.php');
}
