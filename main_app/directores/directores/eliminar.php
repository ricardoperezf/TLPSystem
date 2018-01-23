<?php

require_once 'config.php';
    
    $id = $_GET['id'];
    $query = $DBconexion->prepare("DELETE FROM director WHERE id=?");

    $query->bindParam(1,$id);
    
    if($query->execute()){
        echo "Exitosa eliminación, gracias al Señor";
    } else {
        echo "Vamos, sigue con la eliminación!";
    }
?>
