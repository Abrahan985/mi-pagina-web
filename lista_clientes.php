<?php
 
 require_once ('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	//  Logo
	//  $this->Image('../../img/logo.png',10,8,33);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Movernos a la derecha
	// $this->Cell(60);
	// Título
	$this->Cell(0,10,utf8_decode('Relación de Clientes'),0,0,'C');
	// Salto de línea
	$this->Ln(20);
}

// Pie de página
function Footer()
{
	// Posición: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Número de página
	$this->Cell(0,10,utf8_decode('Página N° ').$this->PageNo().'/{nb}',1,0,'C');
}
}
//recuperamos datos de la venta
$conexion= new mysqli("localhost","root","","ventas");
//$sentencia="SELECT * FROM productos order by Id_producto";
$sentencia="SELECT * FROM clientes ";
$datos=$conexion->query($sentencia);

$n_filas=$datos->num_rows;
$i=1;


// Creación del objeto de la clase PDF 
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Ln(20);

$pdf->Cell(10,10,utf8_decode("N°"),1,0,'C');
$pdf->Cell(20,10,utf8_decode("código"),1,0,'C');
$pdf->Cell(30,10,utf8_decode("paterno"),1,0,'C');
$pdf->Cell(30,10,utf8_decode("materno"),1,0,'C');
$pdf->Cell(60,10,utf8_decode("nombre"),1,0,'C');

$pdf->Ln(10);

if ($n_filas>0){
    while($fila=$datos->fetch_assoc()){
        $codigo_cli=$fila['codigo_cli'];
		$paterno_cli=$fila['paterno_cli'];
        $materno_cli=$fila['materno_cli'];
		$nombre_cli=$fila['nombre_cli'];
		
        $pdf->Cell(10,10,$i,1,0,'C');
		$pdf->Cell(20,10,utf8_decode($codigo_cli),1,0,'C');
        $pdf->Cell(30,10,utf8_decode($paterno_cli),1,0,'C');
		$pdf->Cell(30,10,utf8_decode($materno_cli),1,0,'C');
		$pdf->Cell(60,10,utf8_decode($nombre_cli),1,0,'C');
		
        $pdf->Ln(10);
        $i++;
    }
}


$pdf->Output();
?>