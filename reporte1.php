<?php
 
 require_once ('../fpdf/fpdf.php');

class PDF extends FPDF
{}

// Creación del objeto de la clase PDF 
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',48);
$pdf->Ln(20);



$pdf->Cell(60,30,utf8_decode("Perú"),1,0,'C');
$pdf->Ln(40);
$pdf->SetFont('Times','',12);
$pdf->Cell(100,30,"",0,0,'C');
$pdf->MultiCell(45,5,utf8_decode("hola este es un texto de prueba hola este es un texto de prueba hola este es un texto de prueba hola este es un texto de pruebahola este es un texto de prueba hola este es un texto de prueba hola este es un texto de prueba hola este es un texto de prueba hola este es un texto de prueba hola este es un texto de prueba"),1,'J',0);


$pdf->Cell(25,10,'Nombre',1,0,'C',0);
$pdf->Cell(40,10,'Correo',1,0,'C',0,);
$pdf->Cell(27,10,'Telefono',1,0,'C',0);
$pdf->Cell(27,10,'Password',1,0,'C',0);
$pdf->Cell(27,10,'Imagen',1,0,'C',0);
$pdf->Cell(27,10,'Precio',1,0,'C',0);

$pdf->Ln(40);
$pdf->text(100,50,"hola este es un texto de prueba hola este es un texto de pruebahola este es un texto de pruebahola este es un texto de pruebahola este es un texto de pruebahola este es un texto de pruebahola este es un texto de pruebahola este es un texto de pruebahola este es un texto de pruebahola este es un texto de prueba");
$nuevo_mensaje="nuevo saludo de ejemplo";
$pdf->Ln(20);
$pdf->MultiCell(45,10,utf8_decode($nuevo_mensaje),1,'J',0);
$pdf->Output();
?>