<?php  
 $connect = mysqli_connect("localhost", "root", "", "login");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $nombreDelCurso = mysqli_real_escape_string($connect, $_POST["nombreDelCurso"]);  
      $tipoDeProfesor = mysqli_real_escape_string($connect, $_POST["tipoDeProfesor"]);  
      $tipoDeEstudiante = mysqli_real_escape_string($connect, $_POST["tipoDeEstudiante"]);  
      $tipoDeEquipo = mysqli_real_escape_string($connect, $_POST["tipoDeEquipo"]);  
      
     if($_POST["employee_id"] != '')  
      {  
           $query = "  
           UPDATE cursos   
           SET nombre_curso='$nombreDelCurso',   
           id_profesor='$tipoDeProfesor',   
           id_estudiante='$tipoDeEstudiante',   
           tipo_equipo = '$tipoDeEquipo'
           WHERE id='".$_POST["employee_id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO cursos(nombre_curso, id_profesor, id_estudiante, tipo_equipo)  
           VALUES('$nombreDelCurso', '$tipoDeProfesor', '$tipoDeEstudiante', '$tipoDeEquipo');  
           ";  
           $message = 'Data Inserted';  
      } 
     
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<script>$(document).ready(function () {
                        alert("Data inserted!");
                        });</script>';  
           $select_query = "SELECT cursos.id AS id, cursos.nombre_curso AS nombre, CONCAT(profesores.primer_nombre, ' ', profesores.primer_apellido) AS profesor, CONCAT(estudiantes.primer_nombre,' ', estudiantes.primer_apellido) AS estudiante, cursos.tipo_equipo AS tipo_equipo FROM cursos cursos INNER JOIN profesor profesores INNER JOIN estudiante estudiantes WHERE cursos.id_profesor = profesores.id AND cursos.id_estudiante = estudiantes.id ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">
                    <thead>
                        <th width="10%" class="text-center">Tipo de equipo</th>
                        <th width="20%" class="text-center">Nombre del curso</th>
                        <th width="20%" class="text-center">Profesor</th>
                        <th width="20%" class="text-center">Estudiante</th>
                        <th width="30%" class="text-center" id="actions">Actions</th>
                    </thead>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tbody>
                            <tr>
                                <td>
                                    ' . $row["tipo_equipo"] . '
                                </td>
                                <td>
                                   ' . $row["nombre"] . '
                                </td>
                                <td>
                                    ' . $row["profesor"] . '
                                </td>
                                <td>
                                    ' . $row["estudiante"] . '
                                </td>
                                <td>
                                   <div class="btn-group" role="group" style="width:200px">
                                        <input type="button" name="select" value="Ver"  id="' . $row["id"] . '" class="btn btn-primary view_data" />
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
