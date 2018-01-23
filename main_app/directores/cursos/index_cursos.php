<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['Tipo_usuario'] == 'Subdirector'){
            header("Location: ../sub-directores/");
        } else if($_SESSION['usuario']['Tipo_usuario'] == 'Profesor'){
            header("Location: ../profesores/");
        } else if($_SESSION['usuario']['Tipo_usuario'] == 'Estudiante'){
            header("Location: ../estudiantes/");
        }
    } else {
        header('Location: ../../../');
    }
$connect = mysqli_connect("localhost", "root", "", "login");  
 $query = "SELECT cursos.id AS id, cursos.nombre_curso AS nombre, CONCAT(profesores.primer_nombre, ' ', profesores.primer_apellido) AS profesor, CONCAT(estudiantes.primer_nombre,' ', estudiantes.primer_apellido) AS estudiante, cursos.tipo_equipo AS tipo_equipo FROM cursos cursos INNER JOIN profesor profesores INNER JOIN estudiante estudiantes WHERE cursos.id_profesor = profesores.id AND cursos.id_estudiante = estudiantes.id ORDER BY id DESC";  
 $result = mysqli_query($connect, $query); 

$queryTP = "SELECT * FROM profesor";
$resultTP = mysqli_query($connect,$queryTP);

$queryTE = "SELECT * FROM estudiante";
$resultTE = mysqli_query($connect,$queryTE);

$queryTdE = "SELECT * FROM tipo_equipo";
$resultTdE = mysqli_query($connect,$queryTdE);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TLP Sub director - Estudiantes</title>
        <!-- Bootstrap core CSS -->
        <link href="../../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../../css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/stylet.css">
        <link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
        <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                    <a class="navbar-brand" href="../index.php">TLP</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="../index.php">Dashboard</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido <?php echo $_SESSION['usuario']['Nombre'] ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Configuración de cuenta</a></li>
                                <li class="divider"></li>
                                <li><a href="../../logout.php">Cerrar sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>

        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <h1><span class="glyphiconPrincipal glyphicon-th" aria-hidden="true"></span> Dashboard <small>Manage Your Site</small></h1>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </div>
        </header>

        <body onload="">
            <section id="headerEncabezado">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <h1>Cursos</h1>
                            <p>En esta sección podrás ingresar todos los cursos de TLP.</p>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                </div>
            </section>
            <section id="main">
                <div class="container">
                    <p></p>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#add_data_Modal">
                        <span class="glyphiconAgregar glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    <p></p>
                    <!-- Modal -->
                    <div id="add_data_Modal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Cursos de TLP</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="insert_form">
                                        <label>Curso</label>
                                        <input type="text" name="nombreDelCurso" id="nombreDelCurso" class="form-control" />
                                        <br />
                                        <label>Profesor</label>
                                        <select name="tipoDeProfesor" id="tipoDeProfesor" class="form-control"> 
                                            <?php
                                                while($rowTP = mysqli_fetch_array($resultTP))
                                                {
                                                    extract($rowTP);
                                                ?>
                                                <option  id="tipoDeProfesor" value="<?php echo $rowTP['id'] ?>"><?php echo $rowTP['primer_nombre'], ' ' ,$rowTP['primer_apellido']?></option>
                                                <?php
                                                }
                                            ?>              
                                        </select>
                                        <br />
                                        <label>Estudiante</label>
                                        <select name="tipoDeEstudiante" id="tipoDeEstudiante" class="form-control"> 
                                            <?php
                                                while($rowTE = mysqli_fetch_array($resultTE))
                                                {
                                                    extract($rowTE);
                                                ?>
                                                <option  id="tipoDeEstudiante" value="<?php echo $rowTE['id'] ?>"><?php echo $rowTE['primer_nombre'], ' ' ,$rowTE['primer_apellido'] ?></option>
                                                <?php
                                                }
                                            ?>              
                                        </select>
                                        <br />
                                        <label>Tipo de equipo</label>
                                        <select name="tipoDeEquipo" id="tipoDeEquipo" class="form-control"> 
                                            <?php
                                                while($rowTdE = mysqli_fetch_array($resultTdE))
                                                {
                                                    extract($rowTdE);
                                                ?>
                                                <option  id="tipoDeEquipo" value="<?php echo $rowTdE['tipo_equipo'] ?>"><?php echo $rowTdE['tipo_equipo'] ?></option>
                                                <?php
                                                }
                                            ?>              
                                        </select>
                                        <br />
                                        <input type="hidden" name="employee_id" id="employee_id" />
                                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="dataModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Detalle del curso</h4>
                                </div>
                                <div class="modal-body" id="employee_detail">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class=" col-lg-8 col-md-8 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title-information">Lista de cursos</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <div id="employee_table">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <th width="10%" class="text-center">Tipo de equipo</th>
                                                    <th width="20%" class="text-center">Nombre del curso</th>
                                                    <th width="20%" class="text-center">Profesor</th>
                                                    <th width="20%" class="text-center">Estudiante</th>
                                                    <th width="30%" class="text-center" id="actions">Actions</th>
                                                </thead>
                                                <tbody>
                                                    <?php  
                                             
                                            while($row = mysqli_fetch_array($result))  
                                           {  
                                           ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $row["tipo_equipo"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["nombre"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["profesor"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["estudiante"]; ?>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group" role="group" style="width:270px">

                                                                <button name="edit" id="<?php echo $row['id']; ?>" class="btn btn-primary view_data"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Ver</button>

                                                                <button name="view" id="<?php echo $row['id']; ?>" class="btn btn-warning edit_data"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Editar</button>

                                                                <button name="delete" id="<?php echo $row['id']; ?>" class="btn btn-primary delete_class delete_class"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Eliminar</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php  
                                               }  
                                               ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-12">
                            <img class="imagen" src="../../../img/tlp%202.png" alt="">
                        </div>
                    </div>
            </section>
            <div id="footerIndex">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <p class="lz-copy text-center"> Copyright © 2017 <br> Designed by <br> Ricardo Pérez - TechCode Academy</p>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../../../js/jquery-3-1.1.min.js"></script>
        <script src="../../../js/jquery-1.12.3.min.js"></script>
        <script src="../../../js/bootstrap.min.js"></script>
        <script src="control.js"></script>
        <script>
            $(document).ready(function() {
                $(".delete_class").click(function() {
                    var del_id = $(this).attr('id');
                    $.ajax({
                        type: 'POST',
                        url: 'delete.php',
                        data: 'delete_id=' + del_id,
                        success: function(data) {
                            location.reload(true);
                        },
                        error: function() {
                            alert('Error');
                        }
                    });
                });
            });

        </script>
        <script src="../js/controladorDePagina.js"></script>
    </body>

    </html>
