
<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

    <link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body id="page-top">

    <?php
    $mysqli = new mysqli("localhost", "root", "", "inventarioncc");
    ?>

    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Registro de Anexos</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../includes/validar.php" method="POST">

                        <div class="form-group">
                            <label for="nombre" class="form-label">MAC:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Anexo:</label><br>
                            <input type="text" name="correo" id="correo" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="telefono" class="form-label">Descripcion:</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label for="password">Estado:</label><br>
                            <select name="password" class="form-control" aria-placeholder="Seleccione un Estado">
                                <option value="0" disabled>Seleccione:</option>

                                <?php
                                $query = $mysqli->query("SELECT ID,ESTADO FROM `estados`");
                                while ($valores = mysqli_fetch_array($query)) {
                                    echo '<option id="password" value="' . $valores['ESTADO'] . '">' . $valores['ESTADO'] . '</option>';
                                }
                                ?>
                            </select>
                            <div class="form-group">
                                <label for="telefono" class="form-label">Ubicacion:</label>
                                <input type="text" id="ubicacion" name="ubicacion" class="form-control" value="<?php echo $usuario['UBICACION']; ?>" required>

                            </div>
                            <div class="form-group">
                                <label for="telefono" class="form-label">Piso:</label>
                                <input type="number" id="piso" min="-5" max="4" name="piso" class="form-control" value="<?php echo $usuario['PISO']; ?>" required>

                            </div>
                            <div class="form-group">
                                <label for="telefono" class="form-label">Edificio:</label>
                                <select name="edificio" class="form-control me-2" id="edificio">
                                    <option value="0" disabled>Seleccione:</option>
                                    <?php
                                    $query = $mysqli->query("SELECT DISTINCT EDIFICIO FROM direccion ORDER BY `direccion`.`EDIFICIO` ASC");
                                    while ($valores = mysqli_fetch_array($query)) {
                                        echo '<option id="edificio" value="' . $valores['EDIFICIO'] . '">' . $valores['EDIFICIO'] . '</option>';
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>



                        <div class="mb-3">

                            <input type="submit" value="Guardar" class="btn btn-success" name="registrar">
                            <a href="user.php" class="btn btn-danger">Cancelar</a>

                        </div>


                    </form>
                </div>


            </div>
        </div>
    </div>
</body>

</html>
