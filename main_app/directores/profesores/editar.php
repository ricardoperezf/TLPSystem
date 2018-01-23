<?php

require_once 'config.php';

$id = $_POST['id'];
    $primerNombre = $_POST['primerNombre'];
    $segundoNombre = $_POST['segundoNombre'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];
    $tipoDocumento = $_POST['tipoDocumento'];
    $cedula = $_POST['cedula'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['email'];
    $tipoEquipo = $_POST['tipoEquipo'];
    
    $stmt = $dbcon->prepare("UPDATE profesor SET primer_nombre=?, segundo_nombre=?, primer_apellido=?, segundo_apellido=?, tipo_documento=?,
    cedula=?, direccion=?, telefono=?, correo=?, tipo_equipo=? WHERE id=?");
    $stmt->bindParam(1,$primerNombre);
    $stmt->bindParam(2,$segundoNombre);
    $stmt->bindParam(3,$primerApellido);
    $stmt->bindParam(4,$segundoApellido);
    $stmt->bindParam(5,$tipoDocumento);
    $stmt->bindParam(6,$cedula);
    $stmt->bindParam(7,$direccion);
    $stmt->bindParam(8,$telefono);
    $stmt->bindParam(9,$correo);
    $stmt->bindParam(10,$tipoEquipo);
    $stmt->bindParam(11,$id);
    
    if($stmt->execute()){
        echo "Exitosa actualización, gracias al Señor";
    } else {
        echo "Vamos, sigue con la actualización!";
    }
?>