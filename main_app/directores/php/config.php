<?php

$connect = mysqli_connect("localhost", "root", "", "login");  

if(!$connect){
    echo "Algun problema.";
} else{
    echo "Conexion correcta.";
}
?>