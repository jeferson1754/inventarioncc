<header>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</header>
<?php

require_once("_db.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte.xls");
?>


<table class="table table-striped table-dark " id="table_id">


    <thead>
        <tr>
            <th>MAC</th>
            <th>Anexo</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Ubicacion</th>
            <th>Piso</th>
            <th>Edificio</th>
            <th>Ultima Actualizacion</th>
            <th>Fecha Creacion</th>


        </tr>
    </thead>
    <tbody>

        <?php

        $conexion = mysqli_connect("localhost", "root", "", "inventarioncc");

        if (isset($_POST['fecha1'])) {

            if (strlen($_POST['desde1']) >= 1 && strlen($_POST['hasta1'])  >= 1) {

                $desde = date("Y-m-d", strtotime($_POST['desde1']));
                $hasta = date("Y-m-d", strtotime($_POST['hasta1']));

                $consulta = "SELECT t.ID,t.MAC,t.ANEXO,t.DESCRIPCION,t.ESTADO,d.UBICACION,d.PISO,d.EDIFICIO,t.FECHA_ACTUALIZACION,t.FECHA_CREACION\n"

                    . "FROM telefonos as t INNER JOIN direccion as d  ON t.ID = d.ID WHERE FECHA_CREACION BETWEEN '$desde 00:00:00' AND '$hasta 23:59:59' ORDER BY t.ANEXO ASC";


                $resultado = mysqli_query($conexion, $consulta);



                //$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
                if ($resultado->num_rows > 0) {
                    while ($fila = mysqli_fetch_array($resultado)) {
        ?>
                        <tr>
                            <td><?php echo $fila['MAC']; ?></td>
                            <td><?php echo $fila['ANEXO']; ?></td>
                            <td><?php echo $fila['DESCRIPCION']; ?></td>
                            <td><?php echo $fila['ESTADO']; ?></td>
                            <td><?php echo $fila['UBICACION']; ?></td>
                            <td><?php echo $fila['PISO']; ?></td>
                            <td><?php echo $fila['EDIFICIO']; ?></td>
                            <td><?php echo $fila['FECHA_ACTUALIZACION']; ?></td>
                            <td><?php echo $fila['FECHA_CREACION']; ?></td>
            <?php

                    }
                }
            }
        }
