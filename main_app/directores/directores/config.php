<?php

 $dbhost = 'localhost';
 $dbname = 'login';  
 $dbuser = 'root';                  
 $dbpass = '';                  
 
 try{
  $DBconexion = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
  $DBconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
?>