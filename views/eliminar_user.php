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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="alert alert-danger text-center">
                    <p>¿Desea confirmar la eliminacion del registro?</p>
                    <h1><?php echo $usuario['ANEXO']; ?></h1>
                    <h2>
                        <p><?php echo $usuario['DESCRIPCION']; ?></p>
                    </h2>
                    <h3>
                        <p><?php echo $usuario['ESTADO']; ?></p>
                    </h3>
                    <h3>
                        <p><?php echo $usuario['UBICACION']; ?></p>
                        </h4>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <form action="../includes/_functions.php" method="POST">
                            <input type="hidden" name="accion" value="eliminar_registro">
                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            <input type="submit" name="" value="Eliminar" class=" btn btn-danger">
                            <a href="user.php" class="btn btn-success">Cancelar</a>


                    </div>
                </div>



</body>

</html>