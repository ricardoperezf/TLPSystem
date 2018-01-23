<?php  
 if(isset($_POST["id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "login");  
      $query = "SELECT * FROM director WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Primer Nombre</label></td>  
                     <td width="70%">'.$row["primer_nombre"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Segundo Nombre</label></td>  
                     <td width="70%">'.$row["segundo_nombre"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Primer apellido</label></td>  
                     <td width="70%">'.$row["primer_apellido"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Segundo apellido</label></td>  
                     <td width="70%">'.$row["segundo_apellido"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Tipo de documento</label></td>  
                     <td width="70%">'.$row["tipo_documento"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Cedula</label></td>  
                     <td width="70%">'.$row["cedula"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Direccion</label></td>  
                     <td width="70%">'.$row["direccion"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Teléfono</label></td>  
                     <td width="70%">'.$row["telefono"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Correo electrónico</label></td>  
                     <td width="70%">'.$row["correo"].'</td>  
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
