<?php
 if(isset($_GET["N"])){
    $N=$_GET["N"];
 }
 else{
    $N=7;
 }
 require_once ('../fpdf/fpdf.php');

class PDF extends FPDF
{}
// Creación del objeto de la clase PDF 
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Ln(10);
for ($i=1;$i<=12;$i++){
    $pdf->SetFillColor(15, 232, 22);
    $pdf->SetTextColor(3, 14, 249);
    $pdf->Cell(40,10,$N." * ".$i." = ",1,0,'C',1);
    $pdf->SetFillColor(249, 32, 3);
    $pdf->SetTextColor(249, 3, 230 );
    $pdf->Cell(40,10,$N * $i,1,0,'C',1);
    $pdf->Ln(10);
}
$pdf->Output();
?>

