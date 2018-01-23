 $(document).ready(function () {
     setInterval(function () {
         $('#cantidadSubDirectores').load('../../main_app/php/Informacion.php?count=subdirectores')
     }, 100);
 });
 $(document).ready(function () {
     setInterval(function () {
         $('#cantidadProfesores').load('../../main_app/php/Informacion.php?count=profesores')
     }, 100);
 });
 $(document).ready(function () {
     setInterval(function () {
         $('#cantidadEstudiantes').load('../../main_app/php/Informacion.php?count=estudiantes')
     }, 10);
 });
 $(document).ready(function () {
     setInterval(function () {
         $('#cantidadCursos').load('../../main_app/php/Informacion.php?count=cursos')
     }, 10);
 });