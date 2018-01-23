<?php

require_once 'config.php';

$id = $_GET['id'];
    $stmt = $dbcon->prepare("DELETE FROM profesor WHERE id=?");
    $stmt->bindParam(1,$id);
    
    if($stmt->execute()){
        echo "Exitosa eliminación, gracias al Señor";
    } else {
        echo "Vamos, sigue con la eliminación!";
    }
?>