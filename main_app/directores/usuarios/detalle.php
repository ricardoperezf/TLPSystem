<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "login");  
      $query = "SELECT * FROM usuarios WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Tipo de usuario</label></td>  
                     <td width="70%">'.$row["Tipo_usuario"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Nombre(s) y apellido(s)</label></td>  
                     <td width="70%">'.$row["Nombre"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Usuario</label></td>  
                     <td width="70%">'.$row["Usuario"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Contraseña</label></td>  
                     <td width="70%">'.$row["Password"].'</td>  
                </tr>   
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>
