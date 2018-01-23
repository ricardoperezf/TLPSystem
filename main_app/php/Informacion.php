<?php

require '../conexion.php';
    
$page = isset($_GET['count'])?$_GET['count']:'';

if($page == 'cursos'){
    $result = $mysqli->query("SELECT COUNT(*) AS
    Count FROM cursos");
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo $row['Count'];
        }
    }
} else if($page == 'estudiantes'){
    $result = $mysqli->query("SELECT COUNT(*) AS
    Count FROM estudiantes");
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo $row['Count'];
        }
    }
} else if($page == 'profesores'){
    $result = $mysqli->query("SELECT COUNT(*) AS
    Count FROM profesores");
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo $row['Count'];
        }
    }
} else if($page == 'subdirectores'){
    $result = $mysqli->query("SELECT COUNT(*) AS
    Count FROM sub_directores");
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo $row['Count'];
        }
    }
}
?>
