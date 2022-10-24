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
  <link rel="stylesheet" href="../css/es.css">
  <link rel="stylesheet" href="../css/estilo.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

  <title>Anexos</title>
</head>
<br>
<div class="container is-fluid" style="background-color:#d6dcdf">

  <div class="logo" style="position:absolute;top:10px;right: 10px;">
    <img width="400" height="107" src="https://nuevaclinicacordillera.cl/wp-content/uploads/2021/02/LOGO-CLINICA-CORDILLERA-HORIZONTAL-01-1400x375.png" class="attachment-large size-large" alt="" loading="lazy" srcset="https://nuevaclinicacordillera.cl/wp-content/uploads/2021/02/LOGO-CLINICA-CORDILLERA-HORIZONTAL-01-1400x375.png 1400w, https://nuevaclinicacordillera.cl/wp-content/uploads/2021/02/LOGO-CLINICA-CORDILLERA-HORIZONTAL-01-800x214.png 800w, https://nuevaclinicacordillera.cl/wp-content/uploads/2021/02/LOGO-CLINICA-CORDILLERA-HORIZONTAL-01-768x206.png 768w, https://nuevaclinicacordillera.cl/wp-content/uploads/2021/02/LOGO-CLINICA-CORDILLERA-HORIZONTAL-01-1536x411.png 1536w, https://nuevaclinicacordillera.cl/wp-content/uploads/2021/02/LOGO-CLINICA-CORDILLERA-HORIZONTAL-01-2048x548.png 2048w">
  </div>
  <div class="col-xs-12">
    <h1 class="texto">Bienvenido Administrador <?php echo $_SESSION['nombre']; ?></h1>
    <br>
    <h1 class="texto">Lista de Anexos</h1>
    <br>
    <!-- <p> Mostrar cantidad de <select name="sel" id="value"> 
        <option value="1">1 Registro</option>
        <option value="2">2 Registros</option>
        <option value="3">3 Registros</option>
    </select>
    <br>-->
    <br>
    <div>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#create">
        <span class="glyphicon glyphicon-plus"></span> Nuevo Anexo
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus-square boton1" viewBox="0 0 16 16">
          <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg></a></button>

      <a class="btn btn-warning" onclick="Alerta()">Salir
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-box-arrow-left boton1" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
          <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
        </svg>
      </a>

      <a onclick="FiltrarEXC()" class="btn btn-success" style="color:white;" id="exc1">Excel
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-earmark-excel boton1" viewBox="0 0 16 16">
          <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
          <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
        </svg>
      </a>
      <a onclick="FiltrarPDF()" class="btn btn-danger" style="color:white;" id="pdf1">PDF
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-earmark-pdf boton1" viewBox="0 0 16 16">
          <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
          <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
        </svg> </a>

      <a onclick="BusquePHP()" class="btn btn-info" style="color:white;" id="pdf1">Busqueda Avanzada
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-search boton1" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </svg> </a>
      <a href="user.php" class="btn btn-info" style="color:white;" id="pdf1">Limpiar Busqueda
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-repeat boton1" viewBox="0 0 16 16">
          <path d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192Zm3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z" />
        </svg></a>
    </div>
    <div id="PDF" style="visibility:hidden;height:1px;">
      <form action="../includes/reporte.php" target="_blank" method="POST">
        <div class="form-group">
          <label id="mylabel">Desde: </label>
          <input type="date" id="desde" name="desde" class="form-control" value="" required>
        </div>
        <div class="form-group">
          <label id="mylabel1">Hasta: </label>
          <input type="date" id="hasta" name="hasta" class="form-control" value="" required>
        </div>
        <button type="submit" class="btn btn-danger" ID="BTNPDF" name="fecha"><b>Visualizar</b>
        </button>
      </form>
    </div>
    <div id="EXCEL" style="visibility:hidden;height:1px;">
      <form action="../includes/excel.php" method="POST">
        <div class="form-group">
          <label id="mylabel">Desde: </label>
          <input type="date" id="desde1" name="desde1" class="form-control" value="" required>
        </div>
        <div class="form-group">
          <label id="mylabel1">Hasta: </label>
          <input type="date" id="hasta1" name="hasta1" class="form-control" value="" required>
        </div>
        <button type="submit" class="btn btn-success" ID="BTNEXC" name="fecha1"><b>Descargar</b>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
            <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
          </svg> </button>
      </form>
    </div>
    <br>


    <div class="container-fluid" id="PHP" style="visibility:hidden;height:1px;">
      <form class="d-flex">
        <form action="" method="GET">

          <label style="font-size:20px;">Seleccione Columna: </label>
          <select name="select" class="form-control me-2" id="select" onchange="mostrar()" required>
            <option value="0">Seleccione:</option>
            <option value="Estado">Estado</option>
            <option value="Ubicacion">Ubicacion</option>
            <option value="Piso">Piso</option>
            <option value="Edificio">Edificio</option>

          </select>
          <?php
          $mysqli = new mysqli("localhost", "root", "", "inventarioncc");
          ?>
          <select name="estado" class="form-control me-2" id="estado" style="visibility:hidden; width:0px;">
            <option disabled selected>Selecciona una opción</option>
            <?php
            $query = $mysqli->query("SELECT ID,ESTADO FROM `estados`");
            while ($valores = mysqli_fetch_array($query)) {
              echo '<option id="password" value="' . $valores['ESTADO'] . '">' . $valores['ESTADO'] . '</option>';
            }
            ?>

          </select>
          <button class="btn btn-outline-info" type="submit" id="select1" name="select1" style="visibility:hidden; width:0px;height:0px;"> <b>Buscar </b> </button>
          <input type="text" id="ubi" name="ubi" placeholder="Ubicacion" style="visibility:hidden; width:0px;" class="form-control">
          <button class="btn btn-outline-info" type="submit" id="select2" name="select2" style="visibility:hidden; width:0px;"><b>Buscar </b> </button>
          <input type="number" id="piso" min="-5" max="4" name="piso" placeholder="Piso" class="form-control" style="visibility:hidden; width:0px;">
          <button class="btn btn-outline-info" type="submit" id="select3" name="select3" style="visibility:hidden; width:0px;"><b>Buscar </b> </button>
          <select name="edificio" class="form-control me-2" id="edificio" style="visibility:hidden; width:0px;">
            <option disabled selected>Selecciona una opción</option>
            <?php
            $query = $mysqli->query("SELECT DISTINCT EDIFICIO FROM direccion ORDER BY `direccion`.`EDIFICIO` ASC");
            while ($valores = mysqli_fetch_array($query)) {
              echo '<option id="edificio" value="' . $valores['EDIFICIO'] . '">' . $valores['EDIFICIO'] . '</option>';
            }
            ?>

          </select>

          <button class="btn btn-outline-info" type="submit" id="select4" name="select4" style="visibility:hidden; width:0px;"><b>Buscar</b> </button>
        </form>
      </form>
    </div>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "inventarioncc");
    ?>

    <script type="text/javascript">
      function mostrar() {
        var pizza = document.getElementById("select");
        <?php
        $conexion = mysqli_connect("localhost", "root", "", "inventarioncc");
        $where = "";


        if (isset($_GET['select1'])) {
          $estado = $_GET['estado'];

          if (isset($_GET['estado'])) {
            $where = "WHERE t.ESTADO LIKE'%" . $estado . "%'";
          }
        } else if (isset($_GET['select2'])) {
          $ubi = $_GET['ubi'];

          if (isset($_GET['ubi'])) {
            $where = "WHERE d.UBICACION LIKE'%" . $ubi . "%'";
          }
        } else if (isset($_GET['select3'])) {
          $piso = $_GET['piso'];


          if (isset($_GET['piso'])) {
            $where = "WHERE d.PISO =" . $piso . "";
          }
        } else if (isset($_GET['select4'])) {
          $edi = $_GET['edificio'];

          if (isset($_GET['edificio'])) {
            $where = "WHERE d.EDIFICIO LIKE'%" . $edi . "%'";
          }
        }


        ?>


        if (pizza.value == "0") {
          alert("Seleccione una opcion");
        } else if (pizza.value == "Estado") {
          // $connect1 = mysqli_connect("localhost", "root", "", "inventarioncc");
          pizza.disabled = true;
          document.getElementById("estado").value = "";
          document.getElementById("estado").style.visibility = "visible";
          document.getElementById("estado").style.width = "200px";
          document.getElementById("estado").style.height = "40px";
          document.getElementById("select1").style.visibility = "visible";
          document.getElementById("select1").style.width = "150px";
          document.getElementById("select1").style.height = "40px";



          //mysqli_closed($connect1);
        } else if (pizza.value == "Ubicacion") {
          pizza.disabled = true;
          document.getElementById("ubi").value = "";
          document.getElementById("ubi").style.visibility = "visible";
          document.getElementById("ubi").style.width = "200px";
          document.getElementById("select2").style.visibility = "visible";
          document.getElementById("select2").style.width = "150px";


        } else if (pizza.value == "Piso") {
          pizza.disabled = true;
          document.getElementById("piso").value = "";
          document.getElementById("piso").style.visibility = "visible";
          document.getElementById("piso").style.width = "200px";
          document.getElementById("select3").style.visibility = "visible";
          document.getElementById("select3").style.width = "150px";
          document.getElementById("piso").required = true;

        } else if (pizza.value == "Edificio") {
          pizza.disabled = true;
          document.getElementById("edificio").value = "";
          document.getElementById("edificio").style.visibility = "visible";
          document.getElementById("edificio").style.width = "200px";
          document.getElementById("select4").style.visibility = "visible";
          document.getElementById("select4").style.width = "150px";

        }

      }
    </script>





    </form>
    <!-- <div class="container-fluid">
  <form class="d-flex">
      <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" 
      placeholder="Buscar con JS">
      <hr>
      </form>
  </div>  -->
  </div>
  <br>


  <div style="background-color:white;">
    <br>
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
          <th>Acciones</th>

        </tr>
      </thead>
      <tbody>

        <?php


        $conexion = mysqli_connect("localhost", "root", "", "inventarioncc");
        $SQL = "SELECT t.ID,t.MAC,t.ANEXO,t.DESCRIPCION,t.ESTADO,d.UBICACION,d.PISO,d.EDIFICIO,t.FECHA_ACTUALIZACION,t.FECHA_CREACION\n"

          . "FROM telefonos as t INNER JOIN direccion as d  ON t.ID = d.ID $where";

        $dato = mysqli_query($conexion, $SQL);
        //echo $SQL;
        if ($dato->num_rows > 0) {

          while ($fila = mysqli_fetch_array($dato)) {

        ?>
            <tr>
              <td class="tamaño"><?php echo $fila['MAC']; ?></td>
              <td class="tamaño1"><?php echo $fila['ANEXO']; ?></td>
              <td><?php echo $fila['DESCRIPCION']; ?></td>
              <td><?php echo $fila['ESTADO']; ?></td>

              <td class="table1"><?php echo $fila['UBICACION']; ?></td>
              <td class="table1"><?php echo $fila['PISO']; ?></td>
              <td class="table1"><?php echo $fila['EDIFICIO']; ?></td>
              <td class="table1"><?php echo $fila['FECHA_ACTUALIZACION']; ?></td>
              <td class="table1"><?php echo $fila['FECHA_CREACION']; ?></td>



              <td>


                <a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['ID'] ?> ">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square boton2" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                  </svg> </a>


                <a class="btn btn-danger" id="delete_product" href="eliminar_user.php?id=<?php echo $fila['ID'] ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash3-fill boton2" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                  </svg></a>
              </td>
            </tr>


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
  </div>
  <!-- <div id="paginador" class=""></div>-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>



  <script src="../js/page.js"></script>
  <script src="../js/buscador.js"></script>

  <script>
    $(document).ready(function() {
      $('#pdf1').click(function() {
        $('input[type="date"]').val('');
      });
    });

    $(document).ready(function() {
      $('#exc1').click(function() {
        $('input[type="date"]').val('');
      });
    });

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

              window.location = "../includes/_sesion/cerrarSesion.php"

              break;

            case "Cancelar":




          }
        });


    }


    var click = 1;
    var clic = 1;
    var php = 1;

    function FiltrarPDF() {


      if (clic == 1) {
        document.getElementById("EXCEL").style.visibility = "hidden";
        document.getElementById("EXCEL").style.height = "1px";
        document.getElementById("PDF").style.visibility = "visible";
        document.getElementById("PDF").style.height = "200px";
        document.getElementById("desde").style.width = "150px";
        document.getElementById("hasta").style.width = "150px";
        clic = clic + 1;
        click = 1;

      } else {

        document.getElementById("PDF").style.visibility = "hidden";
        document.getElementById("PDF").style.height = "1px";


        clic = 1;

      }


    }



    function FiltrarEXC() {


      if (click == 1) {
        document.getElementById("PDF").style.visibility = "hidden";
        document.getElementById("PDF").style.height = "1px";
        document.getElementById("EXCEL").style.visibility = "visible";
        document.getElementById("EXCEL").style.height = "200px";
        document.getElementById("desde1").style.width = "150px";
        document.getElementById("hasta1").style.width = "150px";
        click = click + 1;
        clic = 1;

      } else {

        document.getElementById("EXCEL").style.visibility = "hidden";
        document.getElementById("EXCEL").style.height = "1px";


        click = 1;

      }

    }

    function BusquePHP() {


      if (php == 1) {

        document.getElementById("PHP").style.visibility = "visible";
        document.getElementById("PHP").style.height = "25px";
        document.getElementById("select").style.width = "120px";

        php = php + 1;


      } else {

        document.getElementById("PHP").style.visibility = "hidden";
        document.getElementById("PHP").style.height = "1px";
        /*
        document.getElementById("estado").value = "";
        document.getElementById("estado").style.visibility = "hidden";
        document.getElementById("estado").style.width = "1px";
        document.getElementById("estado").style.height = "1px";
        document.getElementById("select1").style.visibility = "hidden";
        document.getElementById("select1").style.width = "1px";
        document.getElementById("select1").style.height = "1px";
      
        document.getElementById("ubi").value = "";
        document.getElementById("ubi").style.visibility = "hidden";
        document.getElementById("ubi").style.width = "1px";
        document.getElementById("select2").style.visibility = "hidden";
        document.getElementById("select2").style.width = "1px";
        pizza.disabled = false;
        document.getElementById("piso").value = "";
        document.getElementById("piso").style.visibility = "hidden";
        document.getElementById("piso").style.width = "1px";
        document.getElementById("select3").style.visibility = "hidden";
        document.getElementById("select3").style.width = "1px";
        document.getElementById("piso").required = false;
        document.getElementById("edificio").value = "";
        document.getElementById("edificio").style.visibility = "hidden";
        document.getElementById("edificio").style.width = "1px";
        document.getElementById("select4").style.visibility = "hidden";
        document.getElementById("select4").style.width = "1px";
          */

        php = 1;

      }

    }
  </script>


  <?php include('../index.php'); ?>
</div>

</html>