<?php
require_once('../fpdf/fpdf.php');



class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        //$this->image('../img/logo.png', 150, 1, 60); // X, Y, Tamaño
        $this->Ln(20);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 20);

        // Movernos a la derecha
        $this->Cell(60);


        // Título
        $this->Cell(70, 10, 'Tabla de Anexos ', 0, 0, 'C');
        // Salto de línea

        $this->Ln(30);
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(8);
        $this->Cell(28, 10, 'MAC', 1, 0, 'C', 0);
        $this->Cell(16, 10, 'Anexo', 1, 0, 'C', 0,);
        $this->Cell(37, 10, 'Descripcion', 1, 0, 'C', 0);
        $this->Cell(22, 10, 'Estado', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'Ubicacion', 1, 0, 'C', 0);
        $this->Cell(15, 10, 'Piso', 1, 0, 'C', 0);
        $this->Cell(38, 10, 'Edificio', 1, 1, 'C', 0);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);

        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página

        $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        //$this->SetFillColor(223, 229,235);
        //$this->SetDrawColor(181, 14,246);
        //$this->Ln(0.5);
    }
}

$conexion = mysqli_connect("localhost", "root", "", "inventarioncc");
if (isset($_POST['fecha'])) {

    if (strlen($_POST['desde']) >= 1 && strlen($_POST['hasta'])  >= 1) {

        $desde = date("Y-m-d", strtotime($_POST['desde']));
        $hasta = date("Y-m-d", strtotime($_POST['hasta']));

        $consulta = "SELECT t.ID,t.MAC,t.ANEXO,t.DESCRIPCION,t.ESTADO,d.UBICACION,d.PISO,d.EDIFICIO,t.FECHA_ACTUALIZACION,t.FECHA_CREACION\n"

            . "FROM telefonos as t INNER JOIN direccion as d  ON t.ID = d.ID WHERE FECHA_CREACION BETWEEN '$desde 00:00:00' AND '$hasta 23:59:59' ORDER BY t.ANEXO ASC";


        $resultado = mysqli_query($conexion, $consulta);

        $pdf = new PDF();

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 10);

        //$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
        while ($row = $resultado->fetch_assoc()) {

            $pdf->SetX(8);

            $pdf->Cell(28, 10, $row['MAC'], 1, 0, 'C', 0);
            $pdf->Cell(16, 10, $row['ANEXO'], 1, 0, 'C', 0);
            $pdf->Cell(37, 10, $row['DESCRIPCION'], 1, 0, 'C', 0);
            $pdf->Cell(22, 10, $row['ESTADO'], 1, 0, 'C', 0);
            $pdf->Cell(40, 10, $row['UBICACION'], 1, 0, 'C', 0);
            $pdf->Cell(15, 10, $row['PISO'], 1, 0, 'C', 0);
            $pdf->Cell(38, 10, $row['EDIFICIO'], 1, 1, 'C', 0);
        }
    }
}





$pdf->Output();