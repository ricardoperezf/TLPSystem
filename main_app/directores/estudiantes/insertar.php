<?php

$connect = mysqli_connect("localhost", "root", "", "login");

if(!empty($_POST))
{
 $output = '';
    $primerNombre = mysqli_real_escape_string($connect, $_POST["primerNombre"]);
    $segundoNombre = mysqli_real_escape_string($connect, $_POST['segundoNombre']);
    $primerApellido = mysqli_real_escape_string($connect, $_POST['primerApellido']);
    $segundoApellido = mysqli_real_escape_string($connect, $_POST['segundoApellido']);
    $tipoDocumento = mysqli_real_escape_string($connect, $_POST['tipoDocumento']);
    $cedula = mysqli_real_escape_string($connect, $_POST['cedula']);
    $direccion = mysqli_real_escape_string($connect, $_POST['direccion']);
    $telefono = mysqli_real_escape_string($connect, $_POST['telefono']);
    $correo = mysqli_real_escape_string($connect, $_POST['correo']);
    $tipoDeEquipo = mysqli_real_escape_string($connect, $_POST['tipoEquipo']);
    
    $query = "
    INSERT INTO estudiante(primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, tipo_documento, cedula, direccion, telefono, correo, tipo_equipo, tipo_usuario)  
     VALUES('$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellido', '$tipoDocumento', '$cedula', '$direccion', '$telefono', '$correo', '$tipoDeEquipo', 'Estudiante')
    ";
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Data Inserted</label>';
    } 
    echo $output;
}
?>
