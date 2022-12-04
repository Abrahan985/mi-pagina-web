

<?php
 
 require_once ('../fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	// Logo
	// $this->Image('../../img/logo.png',10,8,33);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Movernos a la derecha
	$this->Cell(80);
	// Título
	$this->Cell(70,10,utf8_decode('Platos de la casa'),1,0,'C');
	// Salto de línea
	// $this->Ln(20);
    $this->Ln(20);

    $this->Cell(10,10,utf8_decode("N°"),1,0,'C');
    $this->Cell(20,10,utf8_decode("código"),1,0,'C');
    $this->Cell(55,10,utf8_decode("nombre"),1,0,'C');
    $this->Cell(30,10,utf8_decode("medida"),1,0,'C');
    $this->Cell(30,10,utf8_decode("stock"),1,0,'C');
    $this->Cell(30,10,utf8_decode("precio"),1,0,'C');
    $this->Ln(10);
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
$conexion= new mysqli("localhost","root","","r_user");
//$sentencia="SELECT * FROM productos order by Id_producto";
$sentencia="SELECT * FROM productos order by nombre_pro ASC";
$datos=$conexion->query($sentencia);

$n_filas=$datos->num_rows;
$i=1;


// Creación del objeto de la clase PDF 
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
// $pdf->Ln(20);

// $pdf->Cell(10,10,utf8_decode("N°"),1,0,'C');
// $pdf->Cell(20,10,utf8_decode("código"),1,0,'C');
// $pdf->Cell(55,10,utf8_decode("nombre"),1,0,'C');
// $pdf->Cell(30,10,utf8_decode("medida"),1,0,'C');
// $pdf->Cell(30,10,utf8_decode("stock"),1,0,'C');
// $pdf->Cell(30,10,utf8_decode("precio"),1,0,'C');

// $pdf->Ln(10);

if ($n_filas>0){
    while($fila=$datos->fetch_assoc()){
        $nombre_pro=$fila['nombre_pro'];
        $codigo_pro=$fila['codigo_pro'];
		$medida=$fila['medida'];
		$stock_pro=$fila['stock_pro'];
		$precio=$fila['precio'];
       
        $pdf->Cell(10,10,$i,1,0,'C');
        $pdf->Cell(20,10,$codigo_pro,1,0,'C');
        $pdf->Cell(55,10,utf8_decode($nombre_pro),1,0,'L');
		$pdf->Cell(30,10,utf8_decode($medida),1,0,'C');
		$pdf->Cell(30,10,utf8_decode($stock_pro),1,0,'C');
		$pdf->Cell(30,10,utf8_decode($precio),1,0,'C');
        $pdf->Ln(10);
        $i++;
    }
}


$pdf->Output();