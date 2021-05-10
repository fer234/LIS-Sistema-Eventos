<?php
include '../lib/plantilla.php';
if(isset($_SESSION['nombre_usuario']))
{

$time = time();
$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->setMargins(10, 11);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../img/grandevent.png' , 10 ,10, 20 , 13,'PNG');
$pdf->SetFont('Arial', '', 9);
$pdf->MultiCell(150, 10, 'Fecha: '.date('d-m-Y (H:i)', $time).'', 0,'R',0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE EVENTOS', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetFillColor(0,153,0);
$pdf->Cell(40, 8, 'nombre_tipo',1, 0,'C',1);
$pdf->Cell(40, 8, 'nombre_evento',1, 0,'C',1);
$pdf->Cell(40, 8, 'precio_evento',1, 0,'C',1);
$pdf->Cell(40, 8, 'estado',1, 0,'C',1);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(224,224,224);
//CONSULTA
$query = "SELECT tipo_eventos.nombre_tipo, evento.nombre_evento, evento.precio_evento, evento.estado FROM evento INNER JOIN tipo_eventos on evento.id_tipo = tipo_eventos.id_tipo";
$pa = null;
$usuarios = Database::getRows($query, $pa);
foreach ($usuarios as $usuario) 
{
    $nombre_tipo = $usuario['nombre_tipo']; 
    $nombre = $usuario['nombre_evento'];
    $precio= $usuario['precio_evento'];
    $estado = $usuario['estado'];
    $pdf->Cell(40, 8, $nombre, 1, 0, 'C',2);
    $pdf->Cell(40, 8, $nombre_tipo, 1, 0, 'C',2);
    $pdf->Cell(40, 8, $precio, 1, 0, 'C',2);
    $pdf->Cell(40 ,8, $estado, 1, 0, 'C',2);
    $pdf->Ln(8);
}
$pdf->SetY(-5);
    // Arial italic 8
$pdf->SetFont('Arial','I',8);
    // Número de página
$pdf->Cell(0,10,'Pagina '.$pdf->PageNo().'/{nb}',0,0,'C');

$pdf->Output();
}
?>