<?php

require_once ('../fpdf/fpdf.php');
require_once ('conectar.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->image('../assets/icons/logo.png', 207, 1, 90); // X, Y, Tamaño
    $this->Ln(20);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
  
    // Movernos a la derecha
    $this->Cell(85);

    // Título
    $this->Cell(85,30,'Mis inmuebles ',0,0,'C');
    // Salto de línea
   
    $this->Ln(30);
    $this->SetFont('Arial','B',10);
    $this->SetX(4);
    $this->Cell(30,10,'Numero inmueble',1,0,'C',0);
    $this->Cell(30,10,'Numero persona',1,0,'C',0);
    $this->Cell(30,10,'Direccion',1,0,'C',0,);
    $this->Cell(29,10,'Tipo propiedad',1,0,'C',0);
    $this->Cell(27,10,'Localidad',1,0,'C',0);
    $this->Cell(40,10,'Barrio',1,0,'C',0);
    $this->Cell(40,10,'Informacion',1,0,'C',0);
    $this->Cell(20,10,'Valor',1,0,'C',0);
    $this->Cell(34,10,'Creacion',1,1,'C',0);
	

  
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    
    // Arial italic 8
    $this->SetFont('Arial','I',4);
    // Número de página
  
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
   //$this->SetFillColor(223, 229,235);
    //$this->SetDrawColor(181, 14,246);
    //$this->Ln(0.5);
}
}
session_start();
$id_user = $_SESSION ['id_user'];

$conet = new Conexion();
$c = $conet->conectando();
$query2="select * from property where id_user='$id_user'";
$resultado2=mysqli_query($c,$query2);
$arreglo2 = mysqli_fetch_array($resultado2);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage("landscape");
$pdf->SetFont('Arial','',10);
//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
while ($row=$resultado2->fetch_assoc()) {

    $pdf->SetX(4);

    $pdf->Cell(30,10,$row['id_property'],1,0,'C',0);
    $pdf->Cell(30,10,$row['id_user'],1,0,'C',0);
    $pdf->Cell(30,10,$row['direction_property'],1,0,'C',0);
	$pdf->Cell(29,10,$row['type_property'],1,0,'C',0);
    $pdf->Cell(27,10,$row['location_property'],1,0,'C',0);
    $pdf->Cell(40,10,$row['neighborhood_property'],1,0,'C',0);
    $pdf->Cell(40,10,$row['information_property'],1,0,'C',0);
    $pdf->Cell(20,10,$row['cost_property'],1,0,'C',0);
    $pdf->Cell(34,10,$row['create_property'],1,1,'C',0);
	


} 


	$pdf->Output();
?>