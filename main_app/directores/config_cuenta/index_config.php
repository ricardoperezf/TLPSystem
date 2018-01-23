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
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TLP Director - Directores</title>
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
                                <li><a href="index_config.php">Configuración de cuenta</a></li>
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


        <body onload="viewData()">
            <section id="headerEncabezado">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <h1>Configuración de cuenta</h1>
                            <p>En esta sección podrás configurar todos lo relacionado a tu cuenta.</p>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                </div>
            </section>
            <section id="main">
                <div class="container">
                    <h2>Detalle</h2>
                    <label>Primer nombre</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="primerNombre" id="primerNombre" class="form-control" required />

                    </div>
                    <div id="dataModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Detalle del director</h4>
                                </div>
                                <div class="modal-body" id="employee_detail">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="addLabel">Insertar Directores</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="insert_form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Primer nombre</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                        <input type="text" name="primerNombre" id="primerNombre" class="form-control" required />

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Segundo nombre</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                        <input type="text" name="segundoNombre" id="segundoNombre" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Primer apellido</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                        <input type="text" name="primerApellido" id="primerApellido" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Segundo apellido</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                        <input type="text" name="segundoApellido" id="segundoApellido" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tipo documento</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                                        <select id="tipoDocumento" name="tipoDocumento" class="form-control" required>
                                                            <?php
                                                            require_once 'config.php';
        
                                                            $queryTipoDocumento = $DBconexion->prepare('SELECT * FROM tipo_documento');
                                                            $queryTipoDocumento->execute();
        
                                                            while($rowTD = $queryTipoDocumento->fetch(PDO::FETCH_ASSOC))
                                                            {
                                                                extract($rowTD);
                                                                ?>
                                                                <option value="<?php echo $rowTD['tipo_documento'] ?>"><?php echo $rowTD['tipo_documento'] ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Cedula</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                                        <input type="text" name="cedula" id="cedula" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Direccion</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                                        <textarea name="direccion" id="direccion" class="form-control" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                                        <input type="text" name="telefono" id="telefono" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Correo</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">@</span>
                                                        <input type="email" name="correo" id="correo" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="employee_id" id="employee_id" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <input type="submit" name="insert" id="insert" value="Insert" onsubmit="guardar();" class="btn btn-success" />

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <img class="imagen" src="../../../img/tlp%202.png" alt="">
                        </div>
                        <div class="col-md-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title-information">Lista de Directores</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <div id="employee_table">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <th class="text-center">Nombre(s) y apellido(s)</th>
                                                    <th class="text-center">Tipo documento</th>
                                                    <th class="text-center">Cedula</th>
                                                    <th class="text-center">Telefono</th>
                                                    <th class="text-center">Correo</th>
                                                    <th class="text-center" id="actions">Actions</th>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
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
        <script src="controlador.js"></script>
        <script src="../js/controladorDePagina.js"></script>
    </body>

    </html>
