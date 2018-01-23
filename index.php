<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['Tipo_usuario'] == "directores"){
            header('Location: main_app/directores/');
        } else if($_SESSION['usuario']['Tipo_usuario'] == "sub-directores")
        {
            header('Location: main_app/sub-directores/');
        } else if($_SESSION['usuario']['Tipo_usuario'] == "profesores")
        {
            header('Location: main_app/profesores/');
        } else if($_SESSION['usuario']['Tipo_usuario'] == "estudiantes")
        {
            header('Location: main_app/estudiantes/');
        }
    }
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <title>TLP Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap core CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet">
    </head>

    <body>
        <div class="error">
            <span>Datos de ingreso no válidos</span>
        </div>
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" id="formlg">
                            <input type="text" name="usuariolg" pattern="[A-Za-z0-9_-]{1,15}" required placeholder="Usuario" />
                            <input type="password" name="passlg" pattern="[A-Za-z0-9_-]{1,15}" required placeholder="Contraseña" />
                            <input type="submit" class="botonlg" value="Iniciar Sesión" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12-col-xs-12">
                        <h4>
                            <p class="lz-copy text-center"> Copyright © 2017 <br> Designed by Ricardo Pérez - TechCode Academy</p>
                        </h4>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3-1.1.min.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>
