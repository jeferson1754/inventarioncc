<header>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</header>
<?php

require_once("_db.php");




if (isset($_POST['accion'])) {
  switch ($_POST['accion']) {
      //casos de registros
    case 'editar_registro':
      editar_registro();
      break;

    case 'eliminar_registro';
      eliminar_registro();

      break;

    case 'acceso_user';
      acceso_user();
      break;
  }
}

function editar_registro()
{
  $conexion = mysqli_connect("localhost", "root", "", "inventarioncc");
  extract($_POST);
  $consulta = "UPDATE telefonos as t INNER JOIN direccion as d  ON t.ID = d.ID SET t.MAC = '$nombre', t.ANEXO = '$correo', t.DESCRIPCION = '$telefono', t.ESTADO ='$password',d.UBICACION='$ubicacion',d.PISO='$piso' 
        ,d.EDIFICIO='$edificio' ,t.FECHA_ACTUALIZACION = now()  WHERE t.ID = '$id' "or die('error '.mysqli_error($mysqli));   


    mysqli_query($conexion, $consulta);

    // Cierra la conexión con la base de datos 

    echo '<script>
      swal("Listo", "Edicion Exitosa", "success", {
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
    //header('Location: ../views/user.php');
  
}

function eliminar_registro()
{
  $conexion = mysqli_connect("localhost", "root", "", "inventarioncc");
  extract($_POST);
  $id = $_POST['id'];
  $consulta = "UPDATE telefonos SET ESTADO ='Desabilitado', FECHA_ACTUALIZACION = now() WHERE id = '$id'";


  mysqli_query($conexion, $consulta);
  echo '<script>
    swal("Listo", "Actualizacion Exitosa", "success", {
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

  //header('Location: ../views/user.php');
}

function acceso_user()
{
  $nombre = $_POST['nombre'];
  $password = $_POST['password'];
  session_start();
  $_SESSION['nombre'] = $nombre;

  $conexion = mysqli_connect("localhost", "root", "", "inventarioncc");
  $consulta = "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'";
  $resultado = mysqli_query($conexion, "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'");
  $filas = mysqli_fetch_array($resultado);


  if (mysqli_num_rows($resultado) >  0) {
    if ($filas['rol'] == 1) { //admin

      header('Location: ../views/user.php');
    } else if ($filas['rol'] == 2) { //lector
      header('Location: ../views/lector.php');
    } else {
      session_destroy();
    }
  } else {
    echo '<script>
  swal("Error", "Usuario o Contraseña Incorrectos", "error", {
    buttons: {

      Cancelar: true,
    },
  })

  .then((value) => {
    switch (value) {
        default:
            setTimeout(function () { window.location.href = "../includes/_sesion/cerrarSesion.php"; }, 100);
            break;
    }
});
  </script>';
  }
}
