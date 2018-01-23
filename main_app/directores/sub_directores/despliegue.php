<?php

require_once 'config.php';

$page = isset($_GET['p'])?$_GET['p']:'';

    $query = $DBconexion->prepare("SELECT id, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, tipo_documento, cedula, direccion, telefono, correo, tipo_equipo FROM sub_director ORDER BY tipo_equipo");
    $query->execute();
    while($row = $query->fetch()){
        ?>
    <tr>
        <td>
            <?php echo $row['tipo_equipo'] ?>
        </td>
        <td>
            <?php echo $row["primer_nombre"], ' ' ,$row['segundo_nombre'], ' ', $row['primer_apellido'] , ' ', $row['segundo_apellido']?>
        </td>
        <td>
            <?php echo $row['tipo_documento'] ?>
        </td>
        <td>
            <?php echo $row['cedula'] ?>
        </td>
        <td>
            <?php echo $row['telefono'] ?>
        </td>
        <td>
            <?php echo $row['correo'] ?>
        </td>
        <td>
            <!-- Modal -->
            <div class="modal fade" id="edit-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editLabel-<?php echo $row['id'] ?>">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="editLabel-<?php echo $row['id'] ?>">Editar sub-director</h4>
                        </div>
                        <form>
                            <div class="modal-body">
                                <input type="hidden" id="<?php echo $row['id'] ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="primerNombre">Primer nombre</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input type="text" class="form-control" id="primerNombre-<?php echo $row['id'] ?>" value="<?php echo $row['primer_nombre'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="segundoNombre">Segundo nombre</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input type="text" class="form-control" id="segundoNombre-<?php echo $row['id'] ?>" value="<?php echo $row['segundo_nombre'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="primerApellido">Primer apellido</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input type="text" class="form-control" id="primerApellido-<?php echo $row['id'] ?>" value="<?php echo $row['primer_apellido'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="segundoApellido">Segundo apellido</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input type="text" class="form-control" id="segundoApellido-<?php echo $row['id'] ?>" value="<?php echo $row['segundo_apellido'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="tipoDocumento">Tipo documento</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                                <select id="tipoDocumento-<?php echo $row['id'] ?>" name="tipoDocumento" class="form-control">
                                                    <option selected hidden><?php echo $row['tipo_documento'] ?></option>
                                                    <?php
                                                            require_once 'config.php';
        
                                                            $queryTD = $DBconexion->prepare('SELECT * FROM tipo_documento');
                                                            $queryTD->execute();
        
                                                            while($rowTD = $queryTD->fetch(PDO::FETCH_ASSOC))
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
                                            <label for="cedula">Cédula</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                                <input type="text" class="form-control" id="cedula-<?php echo $row['id'] ?>" value="<?php echo $row['cedula'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                                <textarea class="form-control" id="direccion-<?php echo $row['id'] ?>" placeholder="Dirección"><?php echo $row['direccion'] ?></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                                <input type="text" class="form-control" id="telefono-<?php echo $row['id'] ?>" value="<?php echo $row['telefono'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Correo</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">@</span>
                                                <input type="email" class="form-control" id="email-<?php echo $row['id'] ?>" value="<?php echo $row['correo'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="tipoEquipo">Tipo de equipo</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                                <select id="tipoEquipo-<?php echo $row['id'] ?>" name="tipoEquipo" class="form-control">
                                                    <option selected hidden><?php echo $row['tipo_equipo'] ?></option>
                                                    <?php
                                                            require_once 'config.php';
        
                                                            $queryTE = $DBconexion->prepare('SELECT * FROM tipo_equipo');
                                                            $queryTE->execute();
        
                                                            while($rowTE = $queryTE->fetch(PDO::FETCH_ASSOC))
                                                            {
                                                                extract($rowTE);
                                                                ?>
                                                                <option value="<?php echo $rowTE['tipo_equipo'] ?>"><?php echo $rowTE['tipo_equipo'] ?></option>
                                                                <?php
                                                            }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" onclick="updateData(<?php echo $row['id'] ?>);" class="btn btn-primary">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="btn-group" role="group" style="width:270px">
               <button id="editaryeliminar" onclick="detail(<?php echo $row['id'] ?>);" class="btn btn-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Ver</button>
                <button id="editaryeliminar" class="btn btn-warning" data-toggle="modal" data-target="#edit-<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Editar</button>
                <button id="editaryeliminar" onclick="deleteData(<?php echo $row['id'] ?>);" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Eliminar</button>
            </div>
        </td>
    </tr>
    <?php
    }
?>
