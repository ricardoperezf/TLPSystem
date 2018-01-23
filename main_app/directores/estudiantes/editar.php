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
    $tipoDeEquipo = $_POST['tipoEquipo'];

    $query = $DBconexion->prepare("UPDATE estudiante SET primer_nombre=?, segundo_nombre=?, primer_apellido=?, segundo_apellido=?, tipo_documento=?,
    cedula=?, direccion=?, telefono=?, correo=?, tipo_equipo=? WHERE id=?");

    $query->bindParam(1,$primerNombre);
    $query->bindParam(2,$segundoNombre);
    $query->bindParam(3,$primerApellido);
    $query->bindParam(4,$segundoApellido);
    $query->bindParam(5,$tipoDocumento);
    $query->bindParam(6,$cedula);
    $query->bindParam(7,$direccion);
    $query->bindParam(8,$telefono);
    $query->bindParam(9,$correo);
    $query->bindParam(10,$tipoDeEquipo);
    $query->bindParam(11,$id);
    
    if($query->execute()){
        echo "Exitosa actualización, gracias al Señor";
    } else {
        echo "Vamos, sigue con la actualización!";
    }
    
?>
