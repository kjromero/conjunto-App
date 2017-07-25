<?php
require('fpdf.php');
require_once '../../controller/UserController.php';


 $usr = new Usuario();

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	// Logo
	$this->Image('img/logo_s.png',1,2,33);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Movernos a la derecha
	$this->Cell(80);
	// Título
	$this->Cell(50,10,'Parkings',1,0,'C');
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
	$this->Cell(0,10,'Conjunto App '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

foreach ( Usuario::getAllAptos()  as $key => $row) {

	$varl = Usuario::getResidenteIdApto($row['idApto']);
	$nombreResidente;

	foreach ($varl as $key2 => $value) {
		$nombreResidente = $value['nombre'];
	}

	$pdf->Cell(20,15,'El parquadero Numero ' .$row['idParking']." esta asociado al apartamento Numero ".$row['numApto']. " que pertenece al residente ".$nombreResidente  ,0,1);
	//  echo "<option value=".$row['idApto'].;">".$row['numApto']."</option>";
 }

// for($i=1;$i<=40;$i++)
// 	$pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
$pdf->Output();
?>
