<?php

require '../conexion.php';

class InformacionPaneles{
    
    
    function obtenerCursos(){
        $result = $mysqli->query("SELECT COUNT(*) AS
        Count FROM cursos");

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo $row['Count'];
            }
        }
    }

    function obtenerEstudiantes(){
        $result = $mysqli->query("SELECT COUNT(*) AS
        Count FROM estudiantes");

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo $row['Count'];
            }
        }
    }

    function obtenerProfesores(){
        $result = $mysqli->query("SELECT COUNT(*) AS
        Count FROM profesores");

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo $row['Count'];
            }
        }
    }
    function obtenerSubDirectores(){
        $result = $mysqli->query("SELECT COUNT(*) AS
        Count FROM sub_directores");

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo $row['Count'];
            }
        }
    }
}
?>
