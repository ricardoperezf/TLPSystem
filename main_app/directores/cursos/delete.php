<?php

 $connect = mysqli_connect("localhost", "root", "", "login");  
    
    $id = $_POST['delete_id'];
    $query = "delete from cursos where id = $id";
      $output = '';  

    if(mysqli_query($connect, $query)){
         $output .= '<script>$(document).ready(function () {
                        alert("Data eliminated!");
                        });</script>';  
    } else{
         $output .= '<script>$(document).ready(function () {
                        alert("It couldnt delete!");
                        });</script>';  
    }
     echo $output;   
?>
