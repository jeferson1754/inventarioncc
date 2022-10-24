<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

    header("Location: ../includes/login.php");
    die();
}



$id = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "inventarioncc");
$consulta = "SELECT t.ID,t.MAC,t.ANEXO,t.DESCRIPCION,t.ESTADO,d.UBICACION,d.PISO,d.EDIFICIO,t.FECHA_ACTUALIZACION,t.FECHA_CREACION\n"

    . "FROM telefonos as t INNER JOIN direccion as d  ON t.ID = d.ID WHERE t.id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

$mysqli = new mysqli("localhost", "root", "", "inventarioncc");
?>


<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>


    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/es.css">
</head>

<body id="page-top">


    <form action="../includes/_functions.php" method="POST" id="form">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">

                            <br>
                            <br>
                            <h3 class="text-center">Editar Anexo</h3>
                            <div class="form-group">
                                <label for="nombre" class="form-label">MAC:</label>
                                <!--<label id="nombre" name="nombre" class="form-label"/?php echo $usuario['MAC']; /?></label>-->
                                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $usuario['MAC']; ?>" required>

                            </div>
                            <div class="form-group">
                                <label for="username">Anexo:</label><br>
                                <input type="number" name="correo" id="correo" class="form-control" value="<?php echo $usuario['ANEXO']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="form-label">Descripcion:</label>
                                <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $usuario['DESCRIPCION']; ?>" required>

                            </div>
                            <div class="form-group">
                                <label for="password">Estado:</label><br>
                                <select name="password" class="form-control" aria-placeholder="Seleccione un Estado">
                                    <option value="<?php echo $usuario['ESTADO']; ?>">Seleccione:</option>

                                    <?php
                                    $query = $mysqli->query("SELECT ID,ESTADO FROM `estados`");
                                    while ($valores = mysqli_fetch_array($query)) {
                                        echo '<option id="password" value="' . $valores['ESTADO'] . '">' . $valores['ESTADO'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
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
                                    <option value=" <?php echo $usuario['EDIFICIO']; ?>">Seleccione:</option>
                                    <?php
                                    $query = $mysqli->query("SELECT DISTINCT EDIFICIO FROM direccion ORDER BY `direccion`.`EDIFICIO` ASC");
                                    while ($valores = mysqli_fetch_array($query)) {
                                        echo '<option id="edificio" value="' . $valores['EDIFICIO'] . '">' . $valores['EDIFICIO'] . '</option>';
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="accion" value="editar_registro">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </div>

                            <br>

                            <div class="mb-3">

                                <button id="btnSubmit" type="submit" class="btn btn-success" onclick="SwalDelete();">Editar</button>
                                <a href="user.php" class="btn btn-danger">Cancelar</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>



</body>

</html>