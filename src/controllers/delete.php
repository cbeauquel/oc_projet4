<?php 
require_once('src/model/model.php');
function delArtworkPage($delArtworkId){
    if (isset($_POST['go'])) {
        $delArtworkGo = $_POST['go'];
    }
    else {
        $delArtworkGo = null;
    }
    if (isset($delArtworkGo) && isset($delArtworkId) && $delArtworkId > 0 ){
        $connexion = new DbConnexion();

        $repository = new \Application\model\artwork\ArtworkRepository();
        $repository->connexion = $connexion;
        $repository->delArtwork($delArtworkId);
      
        require ('templates/del-succes.php');
    }
    elseif (!isset($delArtworkId)){
        require ('templates/del-fail.php');
    } 
    else {
        require ('templates/supprimer.php');
    }
}