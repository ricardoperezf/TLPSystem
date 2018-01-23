  <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "login");  
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT cursos.id AS id, cursos.nombre_curso AS nombre, CONCAT(profesores.primer_nombre, ' ', profesores.primer_apellido) AS profesor, CONCAT(estudiantes.primer_nombre,' ', estudiantes.primer_apellido) AS estudiante, cursos.tipo_equipo AS tipo_equipo, profesores.id AS profid, estudiantes.id AS estid FROM cursos cursos INNER JOIN profesor profesores INNER JOIN estudiante estudiantes WHERE cursos.id_profesor = profesores.id AND cursos.id_estudiante = estudiantes.id AND cursos.id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>