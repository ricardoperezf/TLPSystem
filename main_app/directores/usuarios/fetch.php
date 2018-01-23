<?php
//fetch.php
    require_once '../../conexion.php';

$page = isset($_GET['busqueda'])?$_GET['busqueda']:'';

if($page == "tipoDeUsuario"){
    if(isset($_POST["action"]))
    {
        $output = '';

        if($_POST["action"] == "tipoDeUsuario")
        {
            $variable = mysql_real_escape_string($_POST['query']);
            $query = '';
            if($variable == "Director"){
                $query = "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS nombre FROM director";
            } else  if($variable == "Subdirector") 
            {
                $query = "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS nombre FROM sub_director";
            } else  if($variable == "Profesor")
            {
                $query = "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS nombre FROM profesor";
            } else  if($variable == "Estudiante")
            {
                $query = "SELECT CONCAT(primer_nombre, ' ', primer_apellido) AS nombre FROM estudiante";
            }
          $result = mysqli_query($mysqli, $query);
          $output .= '<option value="">Selecciona</option>';

        while($row = mysqli_fetch_array($result))
          {
              $output .= '<option value="'.$row["nombre"].'">'.$row["nombre"].'</option>';
          }
         } else{
             echo "error 1";
         }
     echo $output;
    }
} else if($page == "editar"){
    if(isset($_POST["employee_id"]))  
    {  
      $query = "SELECT id, Tipo_usuario, Nombre as nombres, Usuario, Password FROM usuarios WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($mysqli, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
    }  
}
?>
