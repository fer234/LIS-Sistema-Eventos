<?php
include '../lib/plantilla.php';
if(isset($_SESSION['nombre_usuario']))
{
    $sql = "SELECT usuarios.nombres, usuarios.apellidos, usuarios.correo, usuarios.alias   FROM usuarios";
    $params = null;
    $data = Database::getRows($sql, $params);
    $pdf = new PDF('P', 'mm', 'Letter');
    $pdf->SetMargins(10, 10);
    $pdf->SetAutoPageBreak(true, 10);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(15);
    $pdf->Cell(140, 10, 'Listado de Adminitradores', 0, 0, 'C');
    $pdf->ln(20);
    $pdf->SetFillColor(0,153,0);
    $pdf->SetTextColor(224,224,224);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(10);
    $pdf->Cell(40, 8, 'nombres', 0, 0, 'C', 1);
    $pdf->Cell(40, 8, 'apellidos', 0, 0, 'C', 1);
    $pdf->Cell(55, 8, 'correo', 0, 0, 'C', 1);
    $pdf->Cell(40, 8, 'alias', 0, 0, 'C', 1);
    $pdf->ln(6);
    $pdf->SetFillColor(3, 3, 3);
    $pdf->SetFont('Arial', '', 11);
    $pdf->SetTextColor(253, 254, 254);
    $pdf->ln(8);

    foreach($data as $row)
    {
        $pdf->Cell(10);
        $pdf->Cell(40, 8, utf8_decode($row['nombres']), 0, 0, 'C', 1);
        $pdf->Cell(40, 8, utf8_decode($row['apellidos']), 0, 0, 'C', 1);
        $pdf->Cell(55, 8, utf8_decode($row['correo']), 0, 0, 'C', 1); 
        $pdf->Cell(40, 8, utf8_decode($row['alias']), 0, 0, 'C', 1); 
        $pdf->ln(8);
    }
    $pdf->Output();

}
?>
