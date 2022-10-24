<?php

require_once("_db.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=lector.xls");
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
        $consulta = "SELECT t.ID,t.MAC,t.ANEXO,t.DESCRIPCION,t.ESTADO,d.UBICACION,d.PISO,d.EDIFICIO,t.FECHA_ACTUALIZACION,t.FECHA_CREACION\n"

            . "FROM telefonos as t INNER JOIN direccion as d  ON t.ID = d.ID WHERE FECHA_CREACION ORDER BY t.ANEXO ASC";
        $dato = mysqli_query($conexion, $consulta);

        if ($dato->num_rows > 0) {
            while ($fila = mysqli_fetch_array($dato)) {

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
