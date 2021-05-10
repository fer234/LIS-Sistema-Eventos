<?php
require('../../fpdf/fpdf.php');
require('../lib/page.php');
session_start();
$time = time();
$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->setMargins(10, 11);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../img/grandevent.png' , 10 ,10, 60 , 16,'PNG');
$pdf->SetFont('Arial', '', 9);
$pdf->MultiCell(150, 10, 'Fecha: '.date('d-m-Y (H:i)', $time).'', 0,'R',0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'Listado de Adminitradores', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetFillColor(255,102,102);
$pdf->Cell(40, 8, 'Nombre usuario', 1, 0, 'C',1);
$pdf->Cell(40, 8, 'Apellido usuario',1, 0,'C',1);
$pdf->Cell(40, 8, 'Correo',1, 0,'C',1);
$pdf->Cell(40, 8, 'Usuario',1, 0,'C',1);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(251,255,128);
//CONSULTA
$query = "SELECT usuarios.nombres, usuarios.apellidos, usuarios.correo, usuarios.alias   FROM usuarios";
$pa = null;
$usuarios = Database::getRows($query, $pa);
foreach ($usuarios as $usuario) 
{
    $nombre_usuario = $usuario['nombres'];
    $apellidos = $usuario['apellidos'];
    $correo = $usuario['correo'];
    $tipo_usuario = $usuario['alias']; 
    $pdf->Cell(40, 8, $nombre_usuario, 1, 0, 'C',2);
    $pdf->Cell(40 ,8, $apellidos, 1, 0, 'C',2);
    $pdf->Cell(40, 8, $correo, 1, 0, 'C',2);
    $pdf->Cell(40, 8, $tipo_usuario, 1, 0, 'C',2);
    
    $pdf->Ln(8);
}
$pdf->SetY(-5);
    // Arial italic 8
$pdf->SetFont('Arial','I',8);
    // Número de página
$pdf->Cell(0,10,'Pagina '.$pdf->PageNo().'/{nb}',0,0,'C');

$pdf->Output();
?>