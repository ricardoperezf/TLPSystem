<?php  
  require_once '../../conexion.php';

 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $tipoDeUsuario = mysqli_real_escape_string($mysqli, $_POST["tipoDeUsuario"]);  
      $nombre = mysqli_real_escape_string($mysqli, $_POST["nombre"]);  
      $usuario = mysqli_real_escape_string($mysqli, $_POST["usuario"]);  
      $password = mysqli_real_escape_string($mysqli, $_POST["contraseña"]);  
      
     if($_POST["employee_id"] != '')  
      {  
           $query = "  
           UPDATE usuarios   
           SET Tipo_usuario='$tipoDeUsuario',   
           Nombre='$nombre',   
           Usuario='$usuario',   
           Password = '$password'
           WHERE id='".$_POST["employee_id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO usuarios(Tipo_usuario, Nombre, Usuario, Password)  
           VALUES('$tipoDeUsuario', '$nombre', '$usuario', '$password');  
           ";  
           $message = 'Data Inserted';  
      } 
     
      if(mysqli_query($mysqli, $query))  
      {  
           $output .= '<script>$(document).ready(function () {
                        alert("Data inserted!");
                        });</script>';  
           $select_query = "SELECT * FROM usuarios";  
           $result = mysqli_query($mysqli, $select_query);  
           $output .= '  
                <table class="table table-bordered">
                    <thead>
                        <th width="10%" class="text-center">Tipo de usuario</th>
                        <th width="30%" class="text-center">Nombre(s) y apellido(s)</th>
                        <th width="20%" class="text-center">Usuario</th>
                        <th width="20%" class="text-center">Contraseña</th>
                        <th width="30%" class="text-center" id="actions">Actions</th>
                    </thead>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tbody>
                            <tr>
                                <td>
                                    ' . $row["Tipo_usuario"] . '
                                </td>
                                <td>
                                   ' . $row["Nombre"] . '
                                </td>
                                <td>
                                    ' . $row["Usuario"] . '
                                </td>
                                <td>
                                    ' . $row["Password"] . '
                                </td>
                                <td>
                                   <div class="btn-group" role="group" style="width:150px">
                                        <input type="button" name="edit" value="Editar" id="' . $row["id"] . '" class="btn btn-info edit_data" />
                                        <input type="button" value="Eliminar" id="' . $row["id"] . '" class="btn btn-primary delete_class" />
                                    </div>
                                </td>
                            </tr>                  
                     </tbody>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>

