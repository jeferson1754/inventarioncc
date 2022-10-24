<header>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</header>
<?php
$conexion = mysqli_connect("localhost", "root", "", "inventarioncc");
$connect = mysqli_connect("localhost", "root", "", "inventarioncc");

if (isset($_POST['registrar'])) {

  if (
    strlen($_POST['nombre']) >= 1 && strlen($_POST['correo'])  >= 1 && strlen($_POST['telefono'])  >= 1
    && strlen($_POST['password'])  >= 1
  ) {

    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $password = trim($_POST['password']);
    $ubicacion = trim($_POST['ubicacion']);
    $piso = trim($_POST['piso']);
    $edificio = trim($_POST['edificio']);

    $consulta = "INSERT INTO telefonos (MAC, ANEXO, DESCRIPCION, ESTADO, FECHA_CREACION, FECHA_ACTUALIZACION)
    VALUES ('$nombre', '$correo','$telefono','$password', NOW(), NOW())";

    $sql = "INSERT INTO `direccion`(`EDIFICIO`, `PISO`, `UBICACION`) VALUES ('$edificio','$piso','$ubicacion')";

    $nombre = mysqli_query($conexion, "SELECT * FROM telefonos where MAC='$nombre'");

    $correo = mysqli_query($connect, "SELECT * FROM telefonos where ANEXO='$correo'");

    if (mysqli_num_rows($nombre) > 0) {
      echo '<script>
      swal("Error", "MAC Repetida", "error", {
        buttons: {

          Cancelar: true,
        },
      })

      .then((value) => {
        switch (value) {
            default:
                setTimeout(function () { window.location.href = "../views/user.php"; }, 100);
                break;
        }
      });
      </script>';
    } else if (mysqli_num_rows($correo) > 0) {
      echo '<script>
      swal("Error", "Anexo Repetido", "error", {
        buttons: {

          Cancelar: true,
        },
      })

      .then((value) => {
        switch (value) {
            default:
                setTimeout(function () { window.location.href = "../views/user.php"; }, 100);
                break;
        }
      });
      </script>';
    } else {
      $ejecutar = mysqli_query($conexion, $consulta);
      $execute = mysqli_query($connect, $sql);
      echo '<script>
      swal("Listo", "Nuevo Anexo Creado", "success", {
        buttons: {

          Cancelar: true,
        },
      })

      .then((value) => {
        switch (value) {
            default:
                setTimeout(function () { window.location.href = "../views/user.php"; }, 100);
                break;
        }
      });
      </script>';
    }
  }

  //header('Location: ../views/user.php');
}










?>