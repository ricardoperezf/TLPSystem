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
    
require_once '../conexion.php';
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TLP Login</title>
        <!-- Bootstrap core CSS -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/style.css" rel="stylesheet">
        <link href="../../css/main.css">
        <link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
        <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    </head>

    <body lang="es">

        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                    <a class="navbar-brand" href="#">TLP</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Dashboard</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido <?php echo $_SESSION['usuario']['Nombre'] ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="config_cuenta/index_config.php">Configuración de cuenta</a></li>
                                <li class="divider"></li>
                                <li><a href="../logout.php">Cerrar sesión</a></li>
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

        <section id="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphiconPrincipal glyphicon-user"></span>Directores</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse down">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil text-primary"></span><a href="directores/index_directores.php">Lista de directores</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphiconPrincipal glyphicon-user"></span>Sub-Directores</a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse down">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil text-primary"></span><a href="sub_directores/index_subdirectores.php">Lista de sub-directores</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphiconPrincipal glyphicon-user"></span>Profesores</a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse down">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil text-primary"></span><a href="profesores/index_profesores.php">Lista de Profesores</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphiconPrincipal glyphicon-user"></span>Estudiantes</a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse down">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil text-primary"></span><a href="estudiantes/index_estudiantes.php">Lista de Estudiantes</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphiconPrincipal glyphicon-book"></span>Cursos</a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse down">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil text-primary"></span><a href="cursos/index_cursos.php">Lista de cursos</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil text-primary"></span><a href="#">Lista de calificaciones</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil text-primary"></span><a href="#">Lista de formularios</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><span class="glyphiconPrincipal glyphicon-lock"></span>Usuarios</a>
                                    </h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse down">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-pencil text-primary"></span><a href="usuarios/index_usuarios.php">Usuarios del sistema</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title-information">TLP Información</h3>
                            </div>
                            <div class="panel-body panel-body-panelesPrincipales">
                                <div class="col-md-3">
                                    <a href="../directores/directores/index_directores.php">
                                        <div class="wellDirector dash-box">
                                            <h2><span class="glyphiconPrincipal glyphicon-user glyphichonPanel" aria-hidden="true" id=""></span>
                                                <?php
                                                $result = $mysqli->query("SELECT COUNT(*) AS Count FROM director");

                                                if($result->num_rows > 0){
                                                    while($row = $result->fetch_assoc()){
                                                    echo $row['Count'];
                                                    }
                                                }
                                            ?>
                                            </h2>
                                            <h4>Directores</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="../directores/sub_directores/index_subdirectores.php">
                                        <div class="wellSubDirector dash-box">
                                            <h2><span class="glyphiconPrincipal glyphicon-user glyphichonPanel" aria-hidden="true" id=""></span>
                                                <?php
                                                $result = $mysqli->query("SELECT COUNT(*) AS Count FROM sub_director");

                                                if($result->num_rows > 0){
                                                    while($row = $result->fetch_assoc()){
                                                    echo $row['Count'];
                                                    }
                                                }
                                            ?>
                                            </h2>
                                            <h4 class="titulosCajas">Sub-Directores</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="../directores/profesores/index_profesores.php">
                                        <div class="wellProfesor dash-box ">
                                            <h2><span class="glyphiconPrincipal glyphicon-user glyphichonPanel" aria-hidden="true" id=""></span>
                                                <?php
                                                $result = $mysqli->query("SELECT COUNT(*) AS Count FROM profesor");

                                                if($result->num_rows > 0){
                                                    while($row = $result->fetch_assoc()){
                                                    echo $row['Count'];
                                                    }
                                                }
                                            ?>
                                            </h2>
                                            <h4 class="titulosCajas">Profesores</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="../directores/estudiantes/index_estudiantes.php">
                                        <div class="wellEstudiante dash-box ">
                                            <h2><span class="glyphiconPrincipal glyphicon-user glyphichonPanel" aria-hidden="true"></span>
                                                <?php
                                                $result = $mysqli->query("SELECT COUNT(*) AS Count FROM estudiante");

                                                if($result->num_rows > 0){
                                                    while($row = $result->fetch_assoc()){
                                                    echo $row['Count'];
                                                    }
                                                }
                                            ?>
                                            </h2>
                                            <h4 class="titulosCajas">Estudiantes</h4>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <div class="panel panel-defaultUsuarios">
                            <div class="panel-headingUsuarios">
                                <h3 class="panel-title-information">Usuarios</h3>
                            </div>
                            <div class="panel-body panel-body-panelesPrincipales">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <a href="../directores/usuarios/index_usuarios.php">
                                        <div class="wellSubDirector dash-box">
                                            <h2><span class="glyphiconPrincipal glyphicon-lock glyphichonPanel" aria-hidden="true" id=""></span>
                                                <?php
                                                $result = $mysqli->query("SELECT COUNT(*) AS Count FROM usuarios");

                                                if($result->num_rows > 0){
                                                    while($row = $result->fetch_assoc()){
                                                    echo $row['Count'];
                                                    }
                                                }
                                            ?>
                                            </h2>
                                            <h4>Usuarios</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8-col-xs-12">
                        <div class="panel panel-defaultUsuarios">
                            <div class="panel-headingUsuarios">
                                <h3 class="panel-title-information">Información educativa</h3>
                            </div>
                            <div class="panel-body panel-body-panelesPrincipales">
                                <div class="col-md-4">
                                    <a href="../directores/cursos/index_cursos.php">
                                        <div class="wellInformacionEducativa dash-box ">
                                            <h2><span class="glyphiconPrincipal glyphicon-book glyphichonPanel" aria-hidden="true"></span>
                                                <?php
                                                $result = $mysqli->query("SELECT COUNT(*) AS Count FROM cursos");

                                                if($result->num_rows > 0){
                                                    while($row = $result->fetch_assoc()){
                                                    echo $row['Count'];
                                                    }
                                                }
                                            ?>
                                            </h2>
                                            <h4 class="titulosCajas">Cursos</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <div class="wellInformacionEducativa dash-box ">
                                        <h2><span class="glyphiconPrincipal glyphicon-book glyphichonPanel" aria-hidden="true"></span>

                                        </h2>
                                        <h4 class="titulosCajas">Formularios</h4>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <div class="wellInformacionEducativa dash-box ">
                                        <h2><span class="glyphiconPrincipal glyphicon-book glyphichonPanel" aria-hidden="true"></span>

                                        </h2>
                                        <h4 class="titulosCajas">Calificaciones</h4>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <footer id="footerIndex">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <p class="lz-copy text-center"> Copyright © 2017 <br> Designed by <br> Ricardo Pérez - TechCode Academy</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../../js/jquery-3-1.1.min.js"></script>
        <script src="../../js/jquery-1.12.3.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../directores/js/Informacion.js"></script>
        <script src="js/controladorDePagina.js"></script>
    </body>

    </html>
