<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['Tipo_usuario'] == 'sub-directores'){
            header("Location: ../sub-directores/");
        } else if($_SESSION['usuario']['Tipo_usuario'] == 'profesores'){
            header("Location: ../profesores/");
        } else if($_SESSION['usuario']['Tipo_usuario'] == 'directores'){
            header("Location: ../directores/");
        }
    } else {
        header('Location: ../../');
    }
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Estudiantes</title>
        <link rel="stylesheet" href="css/main.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap core CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    </head>

    <body>
        <h1>Bienvenido
            <?php echo $_SESSION['usuario']['Nombre'] ?>
        </h1>
        <a href="../logout.php" class="">Cerrar sesión</a>

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <p class="lz-copy text-center">Copyright 2017 © <strong>TechCode Academy</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3-1.1.min.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>
