<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

  header("Location: ../includes/login.php");
  die();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/fontawesome-all.min.css">
  <link rel="stylesheet" href="../css/page.css">
  <link rel="stylesheet" href="../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

  <title>Usuarios</title>
</head>
<body>
<div class="container is-fluid">




  <div class="col-xs-12">
    <h1>Bienvenido Lector <?php echo $_SESSION['nombre']; ?></h1>
    <br>
    <h1>Lista de Anexos</h1>
    <br>
    <div>

      <a class="btn btn-warning" onclick="Alerta()">Salir
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-box-arrow-left boton1" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
          <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
        </svg>
      </a>
      <a class="btn btn-success" href="../includes/lectorexcel.php">Excel
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-earmark-excel boton1" viewBox="0 0 16 16">
          <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
          <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
        </svg>
      </a>

    </div>
    <br>




    <br>


    </form>



    <table class="table table-striped table-dark table_id " id="table_id">
      <script>
        $(document).ready(function() {
          $('#table_id').DataTable({
            language: {
              processing: "Tratamiento en curso...",
              search: "Buscar:",
              lengthMenu: "Filtro de _MENU_ Anexos",
              info: "Mostrando anexos del _START_ al _END_ de un total de _TOTAL_ anexos",
              infoEmpty: "No existen registros",
              infoFiltered: "(filtrado de _MAX_ anexos en total)",
              infoPostFix: "",
              loadingRecords: "Cargando elementos...",
              zeroRecords: "No se encontraron los datos de tu busqueda..",
              emptyTable: "No hay ningun registro en la tabla",
              paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "Ultimo"
              },
              aria: {
                sortAscending: ": Active para odernar en modo ascendente",
                sortDescending: ": Active para ordenar en modo descendente  ",
              }
            }
          });
        });
      </script>
      <thead>
        <tr>
          <th>MAC</th>
          <th>Anexo</th>
          <th>Descripcion</th>
          <th>Estado</th>
          <th class="table1">Ubicacion</th>
          <th class="table1">Piso</th>
          <th class="table1">Edificio</th>
          <th class="table1">Ultima Actualizacion</th>
          <th class="table1">Fecha Creacion</th>

        </tr>
      </thead>
      <tbody>

        <?php

        $conexion = mysqli_connect("localhost", "root", "", "inventarioncc");
        $SQL = "SELECT t.ID,t.MAC,t.ANEXO,t.DESCRIPCION,t.ESTADO,d.UBICACION,d.PISO,d.EDIFICIO,t.FECHA_ACTUALIZACION,t.FECHA_CREACION\n"

          . "FROM telefonos as t INNER JOIN direccion as d  ON t.ID = d.ID";
        $dato = mysqli_query($conexion, $SQL);

        if ($dato->num_rows > 0) {
          while ($fila = mysqli_fetch_array($dato)) {

        ?>
            <tr>
              <td><?php echo $fila['MAC']; ?></td>
              <td><?php echo $fila['ANEXO']; ?></td>
              <td><?php echo $fila['DESCRIPCION']; ?></td>
              <td><?php echo $fila['ESTADO']; ?></td>
              <td class="table1"><?php echo $fila['UBICACION']; ?></td>
              <td class="table1"><?php echo $fila['PISO']; ?></td>
              <td class="table1"><?php echo $fila['EDIFICIO']; ?></td>
              <td class="table1"><?php echo $fila['FECHA_ACTUALIZACION']; ?></td>
              <td class="table1"><?php echo $fila['FECHA_CREACION']; ?></td>





            <?php
          }
        } else {

            ?>
            <tr class="text-center">
              <td colspan="16">No existen registros</td>
            </tr>


          <?php

        }

          ?>


          </body>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <script>
      function Alerta() {

        swal("Cerrar Sesion!", "Esta Seguro?", "error", {
            buttons: {

              Salir: true,

              Cancelar: true,
            },
          })

          .then((value) => {
            switch (value) {

              case "Salir":
                setTimeout(function() {
                  window.location.href = "../includes/_sesion/cerrarSesion.php";
                }, 100);
                break;

              case "Cancelar":




            }
          });

      }
    </script>

</html>