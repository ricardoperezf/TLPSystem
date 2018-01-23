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
 require_once '../../conexion.php';
    
    $tipoDeUsuario = '';
    $query = "SELECT tipo_usuario FROM tipo_usuario GROUP BY tipo_usuario ORDER BY tipo_usuario ASC";
    $result = mysqli_query($mysqli, $query);
    while($row = mysqli_fetch_array($result))
    {
        $tipoDeUsuario .= '<option value="'.$row["tipo_usuario"].'">'.$row["tipo_usuario"].'</option>';
    }

    $queryTable = "SELECT * FROM usuarios";
    $resultTable = mysqli_query($mysqli,$queryTable);

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TLP Sub director - Usuarios</title>
        <!-- Bootstrap core CSS -->
        <link href="../../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../../css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/stylet.css">
        <link rel="stylesheet" href="../../../css/style.css">
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
            <section id="main">
                <section id="headerEncabezado">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-xs-12">
                                <h1>Usuarios</h1>
                                <p>En esta sección podrás ingresar todos los usuarios que previamente hayan sido registrados en algún puesto de TLP.</p>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    </div>
                </section>
                <div class="container">
                    <p></p>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#add_data_Modal">
                        <span class="glyphiconAgregar glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    <p></p>
                    <div id="dataModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Detalle del usuario</h4>
                                </div>
                                <div class="modal-body" id="employee_detail">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div id="add_data_Modal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Usuarios de TLP</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="insert_form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tipo de usuarios</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                                        <select name="tipoDeUsuario" id="tipoDeUsuario" class="form-control action" required>
                                                            <option value="">Selecciona</option>
                                                            <?php echo $tipoDeUsuario; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre y apellido</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                                        <select name="nombre" id="nombre" class="form-control action" required>
                                                            <option value="">Selecciona</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Usuario</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                                        <input type="text" name="usuario" id="usuario" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Contraseña</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span> <input type="password" name="contraseña" id="contraseña" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title-information">Lista de usuarios</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <div id="employee_table">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <th width="10%" class="text-center">Tipo de usuario</th>
                                                    <th width="30%" class="text-center">Nombre(s) y apellido(s)</th>
                                                    <th width="20%" class="text-center">Usuario</th>
                                                    <th width="20%" class="text-center">Contraseña</th>
                                                    <th width="30%" class="text-center" id="actions">Actions</th>
                                                </thead>
                                                <tbody>
                                                    <?php  
                                             
                                            while($row = mysqli_fetch_array($resultTable))  
                                           {  
                                           ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $row["Tipo_usuario"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["Nombre"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["Usuario"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["Password"]; ?>
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
        <script>
            $(document).ready(function() {
                $(".delete_class").click(function() {
                    var del_id = $(this).attr('id');
                    $.ajax({
                        type: 'POST',
                        url: 'eliminar.php',
                        data: 'delete_id=' + del_id,
                        success: function(data) {
                            $('#employee_table').html(data);
                            location.reload(true);
                        },
                        error: function() {
                            alert('Error');
                        }
                    });
                });
            });

        </script>
        <script>
            $(document).ready(function() {
                $('.action').change(function() {
                    if ($(this).val() != '') {
                        var action = $(this).attr("id");
                        var query = $(this).val();
                        var result = '';
                        if (action == "tipoDeUsuario") {
                            result = 'nombre';
                        }
                        $.ajax({
                            url: "fetch.php?busqueda=tipoDeUsuario",
                            method: "POST",
                            data: {
                                action: action,
                                query: query
                            },
                            success: function(data) {
                                $('#' + result).html(data);
                            }
                        })
                    }
                });
            });

        </script>
    </body>

    </html>
