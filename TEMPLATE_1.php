<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['Tipo_usuario'] == 'sub-directores'){
            header("Location: ../sub-directores/");
        } else if($_SESSION['usuario']['Tipo_usuario'] == 'profesores'){
            header("Location: ../profesores/");
        } else if($_SESSION['usuario']['Tipo_usuario'] == 'estudiantes'){
            header("Location: ../estudiantes/");
        }
    } else {
        header('Location: ../../../');
    }
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
                    <a class="navbar-brand" href="#">TLP</a>
                </div>

                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Dashboard</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a>Bienvenido <?php echo $_SESSION['usuario']['Nombre'] ?></a></li>
                        <li><a href="../logout.php">Cerrar sesión</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>

        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <h1><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Dashboard <small>Manage Your Site</small></h1>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </div>
        </header>

        <section id="main">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title-information">Lista de estudiantes</h3>
                            </div>
                            <div class="panel-body">

                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Panel title</h3>
                            </div>
                            <div class="panel-body">
                                Panel content
                            </div>
                            <div id="losUsuarios"></div>
                        </div>

                    </div>
                    <div class="panel panel-panel-default">

                    </div>
                </div>
            </div>
        </section>

        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../../js/jquery-3-1.1.min.js"></script>
        <script src="../../js/jquery-1.12.3.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/CantidadDeSubDirectores.js"></script>
        <script src="../../js/CantidadDeEstudiantes.js"></script>
        <script src="../../js/CantidadDeProfesores.js"></script>
        <script src="../../js/CantidadDeCursos.js"></script>
    </body>

    </html>
