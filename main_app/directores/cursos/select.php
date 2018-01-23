<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "login");  
      $query = "SELECT cursos.id AS id, cursos.nombre_curso AS nombre, CONCAT(profesores.primer_nombre, ' ', profesores.primer_apellido) AS profesor, CONCAT(estudiantes.primer_nombre,' ', estudiantes.primer_apellido) AS estudiante, cursos.tipo_equipo AS tipo_equipo FROM cursos cursos INNER JOIN profesor profesores INNER JOIN estudiante estudiantes WHERE cursos.id_profesor = profesores.id AND cursos.id_estudiante = estudiantes.id AND cursos.id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Nombre del curso</label></td>  
                     <td width="70%">'.$row["nombre"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Profesor</label></td>  
                     <td width="70%">'.$row["profesor"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Estudiante</label></td>  
                     <td width="70%">'.$row["estudiante"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Tipo de equipo</label></td>  
                     <td width="70%">'.$row["tipo_equipo"].'</td>  
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
