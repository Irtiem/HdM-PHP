<?php
require('./fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Movernos a la derecha
	$this->Cell(80);
	// Título
	$this->Cell(0,10,'Lista Modulos Rol HdM',1,0,'C');
	// Salto de línea
	$this->Ln(20);
	// Logo
	
}


// Pie de página
function Footer()
{
	// Posición: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Número de página
	$this->Cell(0,10,"",1,0);
	
	$this->SetDrawColor(220,220,220);
	$this->setX(10);
	$this->SetLineWidth(1.2);
	$this->Cell(0,10,"","T",0);
	
	$this->setX(10);
	$this->SetLineWidth(1.2);
	$this->setX(20);
	$this->SetDrawColor(220,220,220);
	$this->Cell(20,10,$this->PageNo(),"R",0);
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->SetFont('Times','',12);
$pdf->AliasNbPages();


$pdf->AddPage();

	
	
		$pdf->Cell(100);
		$pdf->Ln();
		$pdf->Cell(10,10,'AQUELARRE ');
		$pdf->Cell(20,20,'La cruz de Santiago ');
		$pdf->Ln();
		$pdf->Cell(10,10,'Cthulhu');
		$pdf->Cell(20,20,'En el Umbral');
		$pdf->Ln();
		$pdf->Cell(10,10,'Dungeons and Dragons');
		$pdf->Cell(20,20,'El ducado de Sparkguard');
		$pdf->Ln();
		$pdf->Cell(10,10,'El senor de los anillos');
		$pdf->Cell(20,20,'El retorno del rey Brujo');
		$pdf->Ln();
		$pdf->Cell(10,10,'Vampiro: La Mascarada');
		$pdf->Cell(20,20,'Hermanos de Sangre');
		$pdf->Ln();
		$pdf->Cell(10,10,'Warhammer Fantasy');
		$pdf->Cell(20,20,'La maldad de Sigmar');
		$pdf->Image('logo.png',10,8,33);
	

$pdf->Output();
?>