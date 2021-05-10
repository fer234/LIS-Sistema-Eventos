<?php
require('fpdf.php');
require('../../lib/database.php');
class PDF extends FPDF
{
//Pie de página
function Footer()
{
$this->SetY(-10);
$this->SetFont('Arial','I',8);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
//Aquí escribimos lo que deseamos mostrar
$sql = ("SELECT * FROM cliente");
while($resultado = mysql_fetch_array($consulta)){
$pdf->Cell(50,5,$resultado['nombres'],1,0,'C');
$pdf->Cell(50,5,$resultado['apellidos'],1,0,'C');
$pdf->Cell(50,5,$resultado['correo'],1,0,'C');
$pdf->Cell(50,5,$resultado['alias'],1,0,'C');
$pdf->Ln();
}  
 
$pdf->Output();
 
?>