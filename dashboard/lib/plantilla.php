<?php
ob_start();
session_start();
require('../../fpdf/fpdf.php');
require('../../lib/database.php');

class PDF extends FPDF
{
// Cabecera de página
    function Header()
    {
        //obtenemos la fecha
        $registro = date("Y-m-d");
        $this->Image('../img/grandevent.png' , 15 ,15, 65 , 25,'PNG');
        $this->SetFont('Arial','B',15);
        $this->Cell(70);
        $this->Cell(120,7, 'GRAND EVENT', 0, 0, 'L');
        $this->SetFont('Arial','',11);
        $this->ln(4);
        $this->Cell(70);
        $this->Cell(120, 7, 'Conoce mas sobre nostros en facebook como: Grand Event', 0, 0, 'L');
        $this->ln(4);
        $this->Cell(70);
        $this->Cell(120, 7, utf8_decode('Tel.: 2225-8483'), 0, 0, 'L');
        $this->ln(4);
        $this->Cell(70);
        $this->Cell(120, 7, utf8_decode('grandevent@gmail.com'), 0, 0, 'L');
        $this->ln(4);
        $this->Cell(70);
        $this->Cell(120, 7, utf8_decode('Dirección: Final 43 Avenida Sur Casa 6 y 7 B Reparto San Luis '), 0, 0, 'L');
        $this->ln(4);
        $this->Cell(70);
        $this->Cell(120, 7, utf8_decode('Fecha: '.$registro), 0, 0, 'L');
        $this->ln(4);
        $this->ln(10);
        $this->Cell(45, 7, utf8_decode('Documento generado por: '), 0, 0, 'L');
        $this->Cell(3);
        $this->Cell(30, 6, utf8_decode($_SESSION['nombre_usuario']), 0, 0, 'L');
        $this->ln(10);
    }

// Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->SetTextColor(3, 3, 3);
        $this->Cell(0,10,'Pagina'.$this->PageNo().'',0,0,'C');
        $this->ln(5);
        $this->Cell(0, 10, 'San Salvador, El Salvador: '.strftime("%A %d de %B del %Y"), 0, 0, 'C');
    }
}
