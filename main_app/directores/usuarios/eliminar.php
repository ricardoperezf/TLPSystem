<?php

   require_once '../../conexion.php';
    
    $id = $_POST['delete_id'];
    $query = "delete from usuarios where id = $id";
    $output = '';  

    if(mysqli_query($mysqli, $query)){
        $output .= '<script>$(document).ready(function () {
                        alert("Data eliminated!");
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
    } else{
         $output .= '<script>$(document).ready(function () {
                        alert("It couldnt delete!");
                        });</script>';  
    }
     echo $output;   
?>
