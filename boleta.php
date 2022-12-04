<?php
 
 require_once ('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	//  Logo
	  $this->Image('../imgs/logo2.png',10,8,33);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Movernos a la derecha
	 $this->Cell(55);
	// Título
	$this->Cell(55,10,utf8_decode('Restaurante "Chinita"'),0,0,'L');
	
	$this->Cell(55,40,utf8_decode('Boleta de venta'),1,0,'C');
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
// Creación del objeto de la clase PDF 
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Ln(20);

//recuperamos datos de la venta
if (isset($_GET['Bv'])){
	$venta=$_GET['Bv'];
}
else{

	$venta="V000001";
}


$conexion= new mysqli("localhost","root","","r_user");
//$sentencia="SELECT * FROM productos order by Id_producto";
$sentencia="SELECT * FROM clientes INNER JOIN ventas on clientes.codigo_cli=ventas.codigo_cli
WHERE ventas.codigo_ven='".$venta."' ";
$datos=$conexion->query($sentencia);



$n_filas=$datos->num_rows;
$i=1;
if ($n_filas>0){
	$fila=$datos->fetch_assoc();
	$paterno_cli=$fila['paterno_cli'];
    $materno_cli=$fila['materno_cli'];
	$nombre_cli=$fila['nombre_cli'];
	$user=$fila['id_usuario'];
	$pdf->Cell(20,10,"Cliente: ",1,0,'C');	
	$pdf->Cell(70,10,utf8_decode($paterno_cli." ".$materno_cli.", ". $nombre_cli),1,0,'C');	
	$pdf->Ln(10);

	$pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(23,83,201);
	$pdf->SetDrawColor(23,83,201);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(10,8,utf8_decode(""),1,0,'C',true);
	$pdf->Cell(20,8,utf8_decode("codigo"),1,0,'C',true);
	$pdf->Cell(40,8,utf8_decode("Descripción"),1,0,'C',true);
	$pdf->Cell(30,8,utf8_decode("medida"),1,0,'C',true);
	$pdf->Cell(30,8,utf8_decode("cantidad"),1,0,'C',true);
	$pdf->Cell(30,8,utf8_decode("precio"),1,0,'C',true);
	$pdf->Cell(30,8,utf8_decode("total"),1,0,'C',true);

	$pdf->Ln(8);

	
	$pdf->SetTextColor(39,39,51);
}
$sentencia="SELECT * FROM productos INNER JOIN detalle on productos.codigo_pro=detalle.codigo_pro WHERE detalle.codigo_ven='".$venta."' ";
$datos=$conexion->query($sentencia);
$n_filas=$datos->num_rows;
$i=1;
if ($n_filas>0){

	
    while($fila=$datos->fetch_assoc()){
        $codigo_pro=$fila['codigo_pro'];
		$nombre_pro=$fila['nombre_pro'];
		$medida=$fila['medida'];
        $cantidad=$fila['cantidad'];
		$precio=$fila['precio'];
		$total=$cantidad*$precio;
		
		
        $pdf->Cell(10,10,$i,1,0,'C');
		$pdf->Cell(20,10,utf8_decode($codigo_pro),1,0,'C');
		$pdf->Cell(40,10,utf8_decode($nombre_pro),1,0,'C');
        $pdf->Cell(30,10,utf8_decode($medida),1,0,'C');
		$pdf->Cell(30,10,utf8_decode($cantidad),1,0,'C');
		$pdf->Cell(30,10,utf8_decode($precio),1,0,'C');
		$pdf->Cell(30,10,utf8_decode($total),1,0,'C');
		
        $pdf->Ln(10);
        $i++;
		
    }

	$pdf->Cell(30,10,utf8_decode($user),1,0,'C');
}


$pdf->Output();
?>