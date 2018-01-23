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
        <link rel="stylesheet" href="css/main.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap core CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link href="css/main.css" rel="stylesheet">
        <link rel="stylesheet" media="screen" href="style_particle.css">
    </head>

    <body>

        <!-- count particles -->
        <!--<div class="count-particles">
            <span class="js-count-particles">--</span> particles
        </div>
        <!-- particles.js container -->
        <!--<div class="main">
            <form action="" id="formlg">
                <input type="text" name="usuariolg" pattern="[A-Za-z0-9_-]{1,15}" required placeholder="Usuario" />
                <input type="text" name="passlg" pattern="[A-Za-z0-9_-]{1,15}" required placeholder="Contraseña" />
                <input type="submit" class="botonlg" value="Iniciar Sesión" />
            </form>
        </div>-->
        <div class="container">
            <div id="login-box">
                <div class="logo">
                    <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img img-responsive img-circle center-block" />
                    <h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
                </div>
                <!-- /.logo -->
                <div class="controls">
                    <input type="text" name="username" placeholder="Username" class="form-control" />
                    <input type="text" name="username" placeholder="Password" class="form-control" />
                    <button type="button" class="btn btn-default btn-block btn-custom">Login</button>
                </div>
                <!-- /.controls -->
            </div>
            <!-- /#login-box -->
        </div>
        <!-- /.container -->

        <div id="particles-js"> </div>

        <!-- scripts -->
        <script src="../js/particles.js"></script>
        <script src="../js/app.js"></script>



        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3-1.1.min.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>
